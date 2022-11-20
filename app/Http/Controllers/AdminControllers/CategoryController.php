<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $rules=[
        'name'=>'required|min:3|max:30',
        'slug'=>'required|unique:categories,slug'
    ];

    public function index()
    {
        return view('admin.categories.index',[
            'categories'=>Category::with('user')->orderBy('id','DESC')->paginate(25)
        ]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        $validated['user_id']=auth()->id();
        Category::create($validated);
       return redirect()->route('admin.categories.create')->with('success','la categorie a été crééé avec succès');
    }


    public function show(Category $category)
    {
        return view('admin.categories.show',[
            'category'=>$category,
        ]);
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'category'=>$category,
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $this->rules['slug']=['required',Rule::unique('categories')->ignore($category)];
        $validated=$request->validate($this->rules);
        $category->update($validated);
        return redirect()->route('admin.categories.index',$category)->with('success','la Catégorie a bien été mis à jour');
    }

    public function destroy(Category $category)
    {
        $default_category_id=Category::where('name','sans-categorie')->first()->id;
        $category->posts()->update(['category_id'=>$default_category_id]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','la Catégorie a bien été supprimée');
    }
}
