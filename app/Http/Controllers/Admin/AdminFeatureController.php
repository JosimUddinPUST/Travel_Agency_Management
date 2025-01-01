<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class AdminFeatureController extends Controller
{
    public function index(){
        $features= Feature::get();
        return view("admin.feature.index",compact("features"));
    }
    public function create(){
        return view("admin.feature.create");
    }
    public function create_submit(Request $request){
        $request->validate([
            'text'=>['required',],
            'heading'=>'required',
            'icon'=>'required',
        ]);
        $feature= new Feature();
        $feature->heading= $request->heading;
        $feature->text= $request->text;
        $feature->icon= $request->icon;
        $feature->save();
        return redirect()->route('admin_feature_index')->with('success','Feature Created Successfully.');

    }

    public function edit($id) {
        $feature= Feature::where('id',$id)->first();
        return view('admin.feature.edit',compact('feature'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'text'=>['required',],
            'heading'=>'required',
            'icon'=>'required',
        ]);
        $feature= Feature::where('id',$id)->first();
        $feature->heading= $request->heading;
        $feature->text= $request->text;
        $feature->icon=$request->icon;
        $feature->save();
        return view('admin.feature.edit',compact('feature'));
    }

    public function delete($id){
        $feature= Feature::where('id',$id)->first();
        $feature->delete();
        return redirect()->route('admin_feature_index')->with('success','Feature Deleted Successfully.');
    }
}
