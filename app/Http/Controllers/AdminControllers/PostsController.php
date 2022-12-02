<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public $rules=[
        'title'=>'required|max:250',
        'slug'=>'required|max:250',
        'excerpt'=>'required|max:300',
        'category_id'=>'required|numeric',
        'thumbnail'=>'required|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=400',
        'body'=>'required',
];

    public function index()
    {
        return view('admin.posts.index',[
            'posts'=>Post::with('category')->paginate(15),
        ]);
    }


    public function create()
    {
        return view('admin.posts.create',[
            'categories'=>Category::pluck('name','id'),
        ]);
    }


    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        $user=User::with('role')->find(auth()->id());
        if($request->approved===null){
            $validated['approved']=0;
        }else{
            $validated['approved']=$request->approved !==null;
        }
        $validated['user_id']=auth()->id();
        $post=Post::create($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            $post->image()->create([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }

        return redirect()->route('admin.posts.index')->with('success','Votre Article a bien été créé!');

    }


    public function show($id)
    {
        //
    }


    public function edit(Post $post)
    {

        return view('admin.posts.edit',[
            'post'=>$post,
            'categories'=>Category::pluck('name','id'),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        //la maj de la photo n'est obligatoire
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=400';

        $validated=$request->validate($this->rules);
        $user=User::with('role')->find(auth()->id());
        if($request->approved===null){
            $validated['approved']=0;
        }else{
            $validated['approved']=$request->approved !==null;
        }
        $post->update($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            //création de l'image de l'article
            $post->image()->update([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }

        return redirect()->route('admin.posts.index',$post)->with('success','Votre Article a bien été mis à jour!');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','L\'article a été supprimé avec succès!');
    }
}
