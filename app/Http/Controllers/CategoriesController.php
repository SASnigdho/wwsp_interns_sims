<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $viewBag['categories'] = Category::orderBy('id','desc')->get();
        return view('categories.index', $viewBag);
    }

    public function create()
    {
       return view('categories.create');
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:categories'
        ]);
        Category::insert([
            'name' => $request->name,
        ]);
      flash('Category Successfully add')->success();
      return redirect()->route('categories.index');
    
    }

    
    public function show($id)
    {
      
    }

  
    public function edit($id)
    {
    $viewBag['category']=Category::findOrFail($id);
    return view('categories.edit',$viewBag);
    }

  
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:categories,name,'.$id
        ]);
// dd($request);
$category=Category::findOrFail($id);
$category->name = $request->name;
if($category->isDirty()){
    $category->update();
}
flash('Category Update Successfully ')->success();
return redirect()->route('categories.index');
    }

  
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        flash('Category Delete Successfully ')->success();
return redirect()->route('categories.index');
    }
}
