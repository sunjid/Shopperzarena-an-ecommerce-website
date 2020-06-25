<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{
   public function __construct()
    {
      $this->middleware('auth:admin');
    }
  public function index()
  {
    $districts = District::orderby('id','asc')->get();
    return view('backend.pages.districts.index', compact('districts'));
  }
  public function create()
  {
    $divisions = Division::orderby('priority','asc')->get();
    return view('backend.pages.districts.create',compact('divisions'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
    'name' => 'required',
    'division_id' => 'required',

  ],
  [
    'name.required' => 'Please provide a district name',
    'division_id.required' => 'Please provide a division for the district',

]);

      $district = new District();
      $district->name = $request->name;
      $district->division_id = $request->division_id;
      $district->save();

      session()->flash('success', 'A New District Has Added Successfully !!');
      return redirect()->route('admin.districts');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
    'name' => 'required',
    'division_id' => 'required',

  ],
  [
    'name.required' => 'Please provide a district name',
    'division_id.required' => 'Please provide a division for the district',

]);
    $district= District::find($id);
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->save();
    session()->flash('success', 'Division Updated Successfully !!');
    return redirect()->route('admin.districts');


  }
  public function edit($id)
  {
    $divisions = Division::orderby('priority','asc')->get();
    $district = District::find($id);
    if(!is_null($district))
    {
        return view('backend.pages.districts.edit', compact('district','divisions'));
    }
    else
    {
        return redirect()->route('admin.districts');
    }
  }
  public function delete($id)
 {
   $district = District::find($id);
   if (!is_null($district)) {
     $district->delete();
   }
   session()->flash('success', 'District Has Deleted Successfully !!');
   return back();
 }
}
