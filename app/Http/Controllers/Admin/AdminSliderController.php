<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSliderController extends Controller
{
    public function index(){
        $sliders= Slider::get();
        return view("admin.slider.index",compact("sliders"));
    }
    public function create(){
        return view("admin.slider.create");
    }
    public function create_submit(Request $request){
        $request->validate([
            "photo"=> ["required",'image','mimes:jpeg,jpg,png,gif'],
            'text'=>['required',],
            'heading'=>'required',
        ]);
        $slider= new Slider();
        $slider->heading= $request->heading;
        $slider->text= $request->text;
        $slider->button_text= $request->button_text;
        $slider->button_link= $request->button_link;

        $final_name='slider_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $slider->photo = $final_name;

        $slider->save();
        return redirect()->route('admin_slider_index')->with('success','Slider Created Successfully.');

    }

    public function edit($id) {
        $slider= Slider::where('id',$id)->first();
        return view('admin.slider.edit',compact('slider'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'text'=>['required',],
            'heading'=>'required',
            'button_text'=>'required',
            'button_link'=>'required',
        ]);
        $slider= Slider::where('id',$id)->first();
        $slider->heading= $request->heading;
        $slider->text= $request->text;
        $slider->button_text= $request->button_text;
        $slider->button_link= $request->button_link;
        if($request->hasFile('photo')){
            $request->validate([
                "photo"=> ["required",'image','mimes:jpeg,jpg,png,gif'],
            ]);
            $final_name='slider_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $slider->photo = $final_name;
            unlink(public_path('uploads/'.$slider->photo));
        }
        $slider->save();
        return view('admin.slider.edit');
    }

    public function delete($id){
        
    }
}
