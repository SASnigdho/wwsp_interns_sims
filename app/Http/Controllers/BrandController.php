<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
   
    public function index()
    {
        $viewBag['brands'] = Brand::orderBy('id','desc')->get();
        return view('brands.index', $viewBag);
    }

   
    public function create()
    { 
         return view('brands.create');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:brands'
        ]);
        Brand::insert([
            'name' => $request->name,
        ]);
      flash('Brand Add Successfully ')->success();
      return redirect()->route('brands.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        
        $viewBag['brand']=Brand::findOrFail($id);
        return view('brands.edit',$viewBag);
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:brands,name,'.$id
        ]);
// dd($request);
$brnad=Brand::findOrFail($id);
$brnad->name = $request->name;
if($brnad->isDirty()){
    $brnad->update();
}
flash('Brnad Update Successfully ')->success();
return redirect()->route('brands.index');
    }

  
    public function destroy($id)
    {
        $brand=Brand::findOrFail($id);
        $brand->delete();
        flash('Brand Delete Successfully ')->success();
return redirect()->route('brands.index');
    }
}
