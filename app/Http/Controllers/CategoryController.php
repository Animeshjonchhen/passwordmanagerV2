<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('Category.index',[
            'categories' => Category::all()
        ]);
    }

    public function show()
    {

    }

    public function create()
    {
        return view('Category.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $attributes['user_id'] = auth()->user()->id;

        Category::create($attributes);

        return redirect('/categories');
    }

    public function edit(Category $category)
    {
        return view('Category.updateCategory',[
            'category' => Category::find($category->id)
        ]);
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required|unique'
        ]);

        $attributes['user_id'] = auth()->user()->id;

        $category->update($attributes);

        return redirect('/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }
}