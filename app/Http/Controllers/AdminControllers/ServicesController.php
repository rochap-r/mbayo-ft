<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public $rules=[
        'title'=>'required|max:250',
        'slug'=>'required|max:250',
        'excerpt'=>'required|max:300',
        'description'=>'required|max:50',
        'thumbnail'=>'required|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=400',
        'body'=>'required',
];

    public function index()
    {
        return view('admin.services.index',[
            'services'=>Service::paginate(10)
        ]);
    }


    public function create()
    {
        return view('admin.services.create');
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
        $service=Service::create($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            $service->image()->create([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }

        return redirect()->route('admin.services.index')->with('success','Votre Service a bien été créé!');

    }


    public function show($id)
    {
        //
    }


    public function edit(Service $service)
    {

        return view('admin.services.edit',[
            'service'=>$service
        ]);
    }

    public function update(Request $request, Service $service)
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

        $service->update($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            //création de l'image de l'article
            $service->image()->update([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }

        return redirect()->route('admin.services.index',$service)->with('success','Votre Service a bien été mis à jour!');
    }


    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Le Service a été supprimé avec succès!');
    }
}
