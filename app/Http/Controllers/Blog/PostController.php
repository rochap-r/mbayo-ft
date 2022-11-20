<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\UserComment;
use Illuminate\Support\Facades\Cookie;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::latest()->where('approved',1)->withCount('comments')->paginate(10);
        $latest_posts=Post::latest()->where('approved',1)->take(6)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count')->get();
        return view('blogs.index',[
            'posts'=>$posts,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
        ]);
    }

    public function show(Post $post)
    {
        $latest_posts=Post::latest()->where('approved',1)->take(6)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count')->get();
        //dd($post);
        return view('blogs.post',[
            'post'=>$post,
            'latest_posts'=>$latest_posts,
            'categories'=>$categories,
        ]);
    }

    public function addComment(Post $post)
    {
        $attributes=request()->validate([
            'name' => 'required', 'string',
            'email' =>'required', 'email', 'unique:user_comments',
            'body'=> ' required|min:3|max:350',
        ]);
        $email=request()->input(['email']);

        $user=UserComment::where('email',[$email])->first();

        if($user==null){
            $name=request()->name;
            $user=UserComment::create([ 'name'=>$name,'email'=>$email  ]);
            $attributes['user_comment_id']=$user->id;
        }else{
            $attributes['user_comment_id']=$user->id;
        }
        $comment=$post->comments()->create($attributes);

        $user=UserComment::where('email',[$email])->first();
        // return back(); redirige vers la meme page
        //#comment_ id sur post section commentaire affiche le dernier commentaire correspondant à cet id
        Cookie::queue('user',$user,120);
        Cookie::queue('user_name',$user->name,120);
        Cookie::queue('user_email',$user->email,120);
        return redirect('/post/'. $post->slug . '/#comment_' . $comment->id)->with('success',' Le Commentaire a bien été ajouté ');
    }
}
