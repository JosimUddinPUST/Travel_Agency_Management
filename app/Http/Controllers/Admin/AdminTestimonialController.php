<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index(){
        $testimonials= Testimonial::get();
        return view("admin.testimonial.index",compact("testimonials"));
    }
    public function create(){
        return view("admin.testimonial.create");
    }
    public function create_submit(Request $request){
        $request->validate([
            'name' => ['required','string'],
            'designation' => ['required','string'],
            'comment' => ['required','string'],
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
        ]);
        $testimonial= new Testimonial();
        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->comment=$request->comment;
        
        $final_name='testimonial_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads/'), $final_name);
        $testimonial->photo = $final_name;
        $testimonial->save();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial Added Successfully');
    }
    public function edit($id){
        $testimonial= Testimonial::where('id',$id)->first();
        return view("admin.testimonial.edit",compact("testimonial"));
    }
    public function edit_submit(Request $request, $id){
        $testimonial= Testimonial::where('id',$id)->first();
        $request->validate([
            'name' => ['required','string'],
            'designation' => ['required','string'],
            'comment' => ['required','string'],
        ]);
        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->comment=$request->comment;
        
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $final_name='testimonial_'.time().'.'.$request->photo->extension();
            if(file_exists(public_path('uploads/'.$testimonial->photo))){
                unlink(public_path('uploads/'.$testimonial->photo));
            }
            $request->photo->move(public_path('uploads/'), $final_name);
            $testimonial->photo = $final_name;
        }
        $testimonial->save();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial Updated Successfully');
    }
    public function delete($id){
        $testimonial= Testimonial::where('id',$id)->first();
        if(file_exists(public_path('uploads/'.$testimonial->photo))){
            unlink(public_path('uploads/'.$testimonial->photo));
        }
        $testimonial->delete();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial Deleted Successfully');
    }
}
