<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{

    public function index()
    {
        $viewBag['categories'] = Category::orderBy('id', 'desc')->get();
        return view('categories.index', $viewBag);
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            flash('Category Successfully added.')->success();
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $viewBag['category'] = Category::findOrFail($id);
        return view('categories.edit', $viewBag);
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;

            if ($category->isDirty()) {
                $category->update();
            }

            flash('Category Update Successfully ')->success();
            return redirect()->route('categories.index');
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        flash('Category Delete Successfully ')->success();
        return redirect()->route('categories.index');
    }
}
