<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $latest_posts=Post::latest()->where('approved',1)->take(6)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count')->get();
        return view('categories.index',[
            'posts'=>$category->posts()->where('posts.approved',1)->withCount('comments')->paginate(10),
            'latest_posts'=>$latest_posts,
            'categories'=>$categories
        ]);
    }
}
