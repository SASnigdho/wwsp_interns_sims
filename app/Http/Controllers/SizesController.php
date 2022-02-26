<?php

namespace App\Http\Controllers;
use App\Models\Size;

use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index()
    {
        $viewBag['sizes'] = Size::orderBy('id','desc')->get();
        return view('sizes.index', $viewBag);
    }

    
    public function create()
    {
        return view('sizes.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|unique:sizes'
        ]);
        Size::insert([
            'name' => $request->name,
        ]);
      flash('Size Create Successfully ')->success();
      return redirect()->route('sizes.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viewBag['size']=Size::findOrFail($id);
        return view('sizes.edit',$viewBag);
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|unique:sizes,name,'.$id
        ]);
// dd($request);
$size=Size::findOrFail($id);
$size->name = $request->name;
if($size->isDirty()){
    $size->update();
}
flash('Size Update Successfully ')->success();
return redirect()->route('sizes.index');
    }

  
    public function destroy($id)
    {
        $size=Size::findOrFail($id);
        $size->delete();
        flash('Size Delete Successfully ')->success();
return redirect()->route('sizes.index');
    }
}
