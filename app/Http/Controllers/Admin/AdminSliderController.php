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
    public function delete(){
        
    }
}
