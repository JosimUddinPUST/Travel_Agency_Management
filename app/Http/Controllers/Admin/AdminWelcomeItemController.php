<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WelcomeItem;

class AdminWelcomeItemController extends Controller
{
    public function edit(){
        $welcome_item= WelcomeItem::where('id',1)->first();
        return view("admin.welcome.edit",compact("welcome_item"));
    }
    public function edit_submit(Request $request){
        $welcome_item= WelcomeItem::where('id',1)->first();
        $request->validate([
            'heading'=>'required',
            'text'=>'required',
            'button_text'=>'required',
            'button_link'=>'required',
            'video'=>'required',
        ]);
       
        $welcome_item= WelcomeItem::where('id',1)->first();
        $welcome_item->heading= $request->heading;
        $welcome_item->text= $request->text;
        $welcome_item->button_text= $request->button_text;
        $welcome_item->button_link= $request->button_link;
        $welcome_item->status= $request->status;
        $welcome_item->video= $request->video;

        if($request->hasFile('photo')){
            $request->validate([
                "photo"=> ["required",'image','mimes:jpeg,jpg,png,gif'],
            ]);
            $final_name='$welcome_item_'.time().'.'.$request->photo->extension();
            if(file_exists(public_path('uploads/'.$welcome_item->photo))){
                unlink(public_path('uploads/'.$welcome_item->photo));
            }

            $request->photo->move(public_path('uploads'), $final_name);
            $welcome_item->photo = $final_name;
        }
        $welcome_item->save();
        return redirect()->back()->with('success','Welcome Item Updated Successfully');
    }
}
