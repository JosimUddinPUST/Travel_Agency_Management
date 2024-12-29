<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Mail\Websitemail;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function login_submit(Request $request)
    {
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        $check= $request->all();
        $data=[
            'email'=>$check['email'],
            'password'=>$check['password']
        ];
        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin_dashboard')->with('success',"Logged in Successfully.");
        }
        else{
            return redirect()->route('admin_login')->with('error','The entered information is invalid! Plz Try again.');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success',"Logout is Successfull");
    }

    public function forget_password(){
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request){
        $request->validate([
            'email'=>['required','email'],
        ]);
        $admin =Admin::where('email',$request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error','Email is not found');
        }

        $token= hash('sha256',time());
        $admin->token=$token;
        $admin->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . ($request->email));
        $subject = "Password Reset";
        $message= "To reset your password, please click on the link below:<br>";
        $message.= "<a href='" . $reset_link ."'>Click Here</a>";
        
        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please click the link to reset.');
    }

    public function reset_password($token,$email){
        $admin=Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin){
            return redirect()->route('admin_login')->with('error','Token or email is not correct');
        }
        return view('admin.reset_password',compact('token','email'));
    }
    public function reset_password_submit(Request $request, $token,$email){
        $request->validate([
            'password'=>['required'],
            'confirm_password'=>['required','same:password'],
        ]);

        $admin=Admin::where('email',$request->email)->where('token',$request->token)->first();
        $admin->password=Hash::make($request->password);
        $admin->token="";
        $admin->update();
        return redirect()->route('admin_login')->with('success','Password reset successfully, Please login with new password');        
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile(){
        return view('admin.profile');

    }
    public function profile_submit(Request $request)
    {
        $request->validate([
            'name'=>['required',],
            'email'=> ['required','email'],
        ]);
        $admin=Admin::where('id',Auth::guard('admin')->user()->id)->first();

        if($request->photo){
            $request->validate([
                'photo'=> ['mimes:jpg,jpeg,png,gif','max:5000'],
            ]);
            $final_name='admin_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            
            $oldPhotoPath = public_path('uploads/' . $admin->photo);
            if (file_exists($oldPhotoPath) && is_writable($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
            $admin->photo= $final_name;
        }
        if($request->password){
            $request->validate([
                'password'=>['required'],
                'confirm_password'=>['required','same:password'],
                ]);
                $admin->password=Hash::make($request->password);
            }
        $admin->name= $request->name;
        $admin->email= $request->email;
        $admin->update();
        return redirect()->back()->with('success','Profile updated successfully');

    }
    

}
