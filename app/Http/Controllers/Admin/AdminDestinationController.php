<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;

class AdminDestinationController extends Controller
{
    public function index(){
        $destinations=Destination::orderBy('id','desc')->get();
        return view("admin.destination.index",compact('destinations'));
    }
    public function create(){
        return view("admin.destination.create");
    }
    public function create_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:destinations',
            'description' => 'required',
            'country' => 'required',
            'language' => 'required',
            'currency' => 'required',
            'area' => 'required',
            'time_zone' => 'required',
            'visa' => 'required',
            'best_time' => 'required',
            'health_safety' => 'required',
            'activities' => 'required',
            'view_count' => 'required',
            'map' => 'required',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $destination=new Destination();
        $destination->name=$request->name;
        $destination->slug=$request->slug;
        $destination->description=$request->description;
        $destination->country=$request->country;
        $destination->language=$request->language;
        $destination->currency=$request->currency;
        $destination->area=$request->area;
        $destination->time_zone=$request->time_zone;
        $destination->visa=$request->visa;
        $destination->best_time=$request->best_time;
        $destination->health_safety=$request->health_safety;
        $destination->activities=$request->activities;
        $destination->view_count=$request->view_count;
        $destination->map=$request->map;
        $final_name = 'destination_'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name);
        $destination->featured_photo=$final_name;
        $destination->save();
        return redirect()->route('admin_destination_index')->with('success','Destination Created Successfully');
    }
    public function edit($id){
        $destination=Destination::find($id);
        return view("admin.destination.edit",compact('destination'));
    }
    public function edit_submit(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:destinations,slug,'.$id,
            'description' => 'required',
            'country' => 'required',
            'language' => 'required',
            'currency' => 'required',
            'area' => 'required',
            'time_zone' => 'required',
            'visa' => 'required',
            'best_time' => 'required',
            'health_safety' => 'required',
            'activities' => 'required',
            'view_count' => 'required',
            'map' => 'required',
        ]);
        $destination=Destination::find($id);
        $destination->name=$request->name;
        $destination->slug=$request->slug;
        $destination->description=$request->description;
        $destination->country=$request->country;
        $destination->language=$request->language;
        $destination->currency=$request->currency;
        $destination->area=$request->area;
        $destination->time_zone=$request->time_zone;
        $destination->visa=$request->visa;
        $destination->best_time=$request->best_time;
        $destination->health_safety=$request->health_safety;
        $destination->activities=$request->activities;
        $destination->view_count=$request->view_count;
        $destination->map=$request->map;

        if($request->hasFile('featured_photo')){
            $request->validate([
                'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
           
            $final_name = 'destination_'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $destination->featured_photo=$final_name;
        }

        $destination->save();
        return redirect()->route('admin_destination_index')->with('success','Destination Updated Successfully');
    }
    public function delete($id){
        $destination=Destination::find($id);
        
        if(file_exists(public_path('uploads/'.$destination->featured_photo))){
            unlink(public_path('uploads/'.$destination->featured_photo));
        }
        $destination->delete();
        return redirect()->route('admin_destination_index')->with('success','Destination Deleted Successfully');
    }

    public function destination_photos_index($id){
        $destination=Destination::find($id);
        $destination_photos=DestinationPhoto::where('destination_id',$id)->orderBy('id','desc')->get();

        return view("admin.destination.photos_index",compact('destination','destination_photos'));
    }
    public function destination_photo_create($id){
        $destination=Destination::find($id);
        return view("admin.destination.photo_create",compact('destination'));
    }
    public function destination_photo_create_submit(Request $request,$id){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $destination_photo=new DestinationPhoto();
        $destination_photo->destination_id=$id;
        $final_name = 'destination_photo_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $destination_photo->photo=$final_name;
        $destination_photo->save();
        return redirect()->route('admin_destination_photos_index',$id)->with('success','Destination Photo Created Successfully');
    }
    public function destination_photo_edit($id){
        $destination_photo=DestinationPhoto::find($id);
        $destination=Destination::find($destination_photo->destination_id);
        return view("admin.destination.photo_edit",compact('destination_photo','destination'));
    }
    public function destination_photo_edit_submit(Request $request,$id){
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
    
            $destination_photo=DestinationPhoto::find($id);
            if(file_exists(public_path('uploads/'.$destination_photo->photo))){
                unlink(public_path('uploads/'.$destination_photo->photo));
            }
            $final_name = 'destination_photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $destination_photo->photo=$final_name;
            $destination_photo->save();  
        }
        return redirect()->route('admin_destination_photos_index',$destination_photo->destination_id)->with('success','Destination Photo Updated Successfully');
    }    

    public function destination_photo_delete($id){
        $destination_photo=DestinationPhoto::find($id);
        if(file_exists(public_path('uploads/'.$destination_photo->photo))){
            unlink(public_path('uploads/'.$destination_photo->photo));
        }
        $destination_photo->delete();
        return redirect()->route('admin_destination_photos_index',$destination_photo->destination_id)->with('success','Destination Photo Deleted Successfully');
    }
    public function destination_videos_index($id){
        $destination=Destination::find($id);
        $destination_videos=DestinationVideo::where('destination_id',$id)->orderBy('id','desc')->get();

        return view("admin.destination.videos_index",compact('destination','destination_videos'));
    }
    public function destination_video_create($id){
        $destination=Destination::find($id);
        return view("admin.destination.video_create",compact('destination'));
    }
    public function destination_video_create_submit(Request $request,$id){
        $request->validate([
            'video_id' => 'required',
        ]);

        $destination_video=new DestinationVideo();
        $destination_video->destination_id=$id;
        $destination_video->video_id=$request->video_id;
        $destination_video->save();
        return redirect()->route('admin_destination_videos_index',$id)->with('success','Destination Video Created Successfully');
    }
    public function destination_video_edit($id){
        $destination_video=DestinationVideo::find($id);
        $destination=Destination::find($destination_video->destination_id);
        return view("admin.destination.video_edit",compact('destination_video','destination'));
    }
    public function destination_video_edit_submit(Request $request,$id){
        $request->validate([
            'video_id' => 'required',
        ]);
    
        $destination_video=DestinationVideo::find($id);
        $destination_video->video_id=$request->video_id;
        $destination_video->save();  
        return redirect()->route('admin_destination_videos_index',$destination_video->destination_id)->with('success','Destination Video Updated Successfully');
    }
    public function destination_video_delete($id){
        $destination_video=DestinationVideo::find($id);
        $destination_video->delete();
        return redirect()->route('admin_destination_videos_index',$destination_video->destination_id)->with('success','Destination Video Deleted Successfully');
    }


}
