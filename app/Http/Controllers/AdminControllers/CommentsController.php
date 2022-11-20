<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    private $rules=[ 'post_id'=>'required|numeric','body'=>'required|min:3|max:1000' ];

    public function index()
    {
        return view('admin.comments.index',[
            'comments'=>Comment::latest()->orderBy('post_id')->paginate(25),
        ]);
    }


    public function create()
    {
        return view('admin.comments.create',[
           'posts'=>Post::pluck('title','id'),
        ]);
    }


    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        $admin=User::find(auth()->id());
        $user=UserComment::where('email',$admin->email)->first();

        if($user==null){
            $user=UserComment::create([ 'name'=>$admin->name,'email'=>$admin->email ]);
            $validated['user_comment_id']=$user->id;
        }else{
            $validated['user_comment_id']=$user->id;
        }
        Comment::create($validated);
        return redirect()->route('admin.comments.create')->with('success','Votre Commentaire a été créé avec success!');
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit',[
            'posts'=>Post::pluck('title','id'),
            'comment'=>$comment
        ]);
    }


    public function update(Request $request,Comment $comment)
    {
        //same ule
        $validated=$request->validate($this->rules);
        $comment->update($validated);
        return redirect()->route('admin.comments.index')->with('success','Votre Commentaire a été mis à jour avec success!');
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success','Votre Commentaire a été supprimé avec success!');
    }
}
