<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class AdminTeamMemberController extends Controller
{
    public function index(){
        $team_members = TeamMember::all();
        return view('admin.team_members.index',compact('team_members'));
    }

    public function create(){
        return view('admin.team_members.create');
    }

    public function create_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'biography' => 'required',
        ]);

        $team_member = new TeamMember();
        $team_member->name = $request->name;
        $team_member->designation = $request->designation;
        $team_member->phone = $request->phone;
        $team_member->email = $request->email;
        $team_member->address = $request->address;
        $team_member->biography = $request->biography;
        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;
        
        $final_name = 'team_member_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'),$final_name);
        $team_member->photo = $final_name;
        $team_member->save();
        return redirect()->route('admin_team_member_index')->with('success','Team Member Created Successfully');
    }

    public function edit($id){
        $team_member = TeamMember::where('id', $id)->first();
        return view('admin.team_members.edit',compact('team_member'));
    }

    public function edit_submit(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'biography' => 'required',
        ]);

        $team_member = TeamMember::find($id);
        $team_member->name = $request->name;
        $team_member->designation = $request->designation;
        $team_member->phone = $request->phone;
        $team_member->email = $request->email;
        $team_member->address = $request->address;
        $team_member->biography = $request->biography;

        $team_member->facebook = $request->facebook;
        $team_member->twitter = $request->twitter;
        $team_member->linkedin = $request->linkedin;
        $team_member->instagram = $request->instagram;

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $final_name = 'team_member_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'),$final_name);
            if(file_exists(public_path('uploads/'.$team_member->photo))){
                unlink(public_path('uploads/'.$team_member->photo));
            }
            $team_member->photo = $final_name;
        }

        $team_member->save();
        return redirect()->route('admin_team_member_index')->with('success','Team Member Updated Successfully');
    }
    public function delete($id){
        $team_member = TeamMember::find($id);
        if(file_exists(public_path('uploads/'.$team_member->photo))){
            unlink(public_path('uploads/'.$team_member->photo));
        }
        $team_member->delete();
        return redirect()->route('admin_team_member_index')->with('success','Team Member Deleted Successfully');
    }
}
