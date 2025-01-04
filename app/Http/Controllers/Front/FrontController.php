<?php

namespace App\Http\Controllers\Front;


use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\WelcomeItem;
use App\Models\Feature;
use App\Models\CounterItem;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Faq;
use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\Destination;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\Package;
use App\Models\PackageFaq;
use App\Models\Tour;

class FrontController extends Controller
{
    public function home(){

        $sliders= Slider::get();
        $welcome_item= WelcomeItem::where('id',1)->first();
        $features=Feature::get();
        $testimonials=Testimonial::get();
        $popular_destinations=Destination::orderBy('view_count','desc')->get()->take(8);
        $latest_posts=Post::with('blog_category')->orderBy('id','desc')->get()->take(3);

        return view("front.home",compact('sliders','welcome_item','features','testimonials','popular_destinations','latest_posts'));
    }
    public function about(){
        $welcome_item= WelcomeItem::where('id',1)->first();
        $features=Feature::get();
        $counter_item=CounterItem::where('id',1)->first();

        return view("front.about",compact('welcome_item','features','counter_item'));
    }
    public function blog(){
        $posts=Post::with('blog_category')->paginate(3);
        return view("front.blog",compact('posts'));
    }
    
    public function post_details($slug){
        $post=Post::where('slug',$slug)->with('blog_category')->first();
        
        $categories = BlogCategory::orderBy('id','desc')->get();

        $latest_posts=Post::where('id','!=',$post->id)->with('blog_category')->orderBy('id','desc')->get()->take(5);
        return view("front.post_details",compact('post','categories','latest_posts'));
    }

    public function blog_category($slug){
        $category=BlogCategory::where('slug',$slug)->first();
        $posts=Post::where('blog_category_id',$category->id)->with('blog_category')->paginate(3);
        return view("front.blog_category",compact('category','posts'));
    }

    public function contact(){
        return view("front.contact");
    }
    public function faq(){
        $faqs=Faq::get();
        return view("front.faq",compact('faqs'));
    }
    public function team_members(){

        $team_members=TeamMember::paginate(4);

        return view("front.team_members",compact('team_members'));
    }
    public function team_member_details($id){
        $team_member=TeamMember::find($id);
        return view("front.team_member_details",compact('team_member'));
    }

    public function destinations(){

        $destinations=Destination::orderBy('id','desc')->paginate(4);
        return view("front.destinations",compact('destinations'));
    }
    public function destination_details($slug){
        $destination=Destination::where('slug',$slug)->first();
        $destination_photos=DestinationPhoto::where('destination_id',$destination->id)->get();
        $destination_videos=DestinationVideo::where('destination_id',$destination->id)->get();

        return view("front.destination_details",compact('destination','destination_photos','destination_videos'));
    }
    public function packages(){
        $packages=Package::orderBy('id','desc')->paginate(4);
        return view("front.packages",compact('packages'));
    }
    public function package_details($slug){
        $package=Package::where('slug',$slug)->first();
        $package_faqs=PackageFaq::where('package_id',$package->id)->get();
        $tours=Tour::where('package_id',$package->id)->get();


        return view("front.package_details",compact('package','package_faqs','tours'));
    }

    public function enquery_form_submit(Request $request,$id){
        $package=Package::find($id);
        $admin=Admin::where('id','1')->first();
        $request->validate([
            "name"=> "required",
            "email"=> "required|email",
            "phone"=> "required",
            "message"=> "required",
        ]);
        $data=[
            "name"=> $request->name,
            "email"=> $request->email,
            "phone"=> $request->phone,
            "message"=> $request->message,
        ];
        $subject= 'Enquery Form for '.$package->name;
        $message= 'Name: '.$data['name'].'<br>Email: '.$data['email'].'<br>Phone: '.$data['phone'].'<br>Message: '.$data['message'];

        Mail::to($admin->email)->send(new Websitemail($subject, $message));

        $message= 'Thank you for your enquery. We will contact you soon.';
        Mail::to($data['email'])->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success','Your enquery is submitted successfully.');
    }

    public function registration(){
        return view("front.registration");
    }
    public function registration_submit(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users,email",
            "password"=> "required|min:6",
            "confirm_password"=>["required","same:password"],
        ]);
        $token= Hash('sha256',time());
        $verification_link= route('user_registration_verify_email',['email'=>$request->email,'token'=>$token]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token= $token;
        $user->save();

        $subject = "User Account Verification";
        $message = 'Please click the following link to verify your email address: <br><a href="'.$verification_link.'">Verify Email</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('user_login')->with("success","Registration Successful. Now, check your email to verify and login.");
    }
    public function registration_verify_email($email, $token){  
        $user = User::where("email", $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('user_registration')->with('error','The registration could not verified correctly');
        }
        $user->token = '';
        $user->status = '1';
        $user->save();

        return redirect()->route('user_login')->with('success','Your email is verified successfully.');
    }

    public function login(){
        return view("front.login");
    }
    public function login_submit(Request $request){
        $request->validate([
            "email"=> ["required","email"],
            "password"=> ["required",],
            "status"=>'1',
        ]);
        $check=$request->all();
        $data=[
            "email"=> $check["email"],
            "password"=> $check["password"],
            "status"=> '1',
        ];
        if(Auth::guard("web")->attempt($data)){
            return redirect()->route("user_dashboard")->with("success","Login is Successful.");
        }else{
            return redirect()->route("user_login")->with("error","The entered information is not correct")->withInput();
        }

    }
    public function logout(){
        Auth::guard("web")->logout();
        return redirect()->route("user_login")->with("success","Logout Successfully");
    }

    public function forget_password(){
        return view("front.forget-password");
    }
    public function forget_password_submit(Request $request){
        $request->validate([
            "email"=> ["required","email"],
        ]);
        $user= User::where("email", $request->email)->first();
        if(!$user){
            return redirect()->route("user_login")->with("error","Email not found");
        }
        $token=Hash('sha256',time());
        $user->token=$token;
        $user->save();

        $reset_link=url('user/reset-password/'.($request->email).'/'.$token);
        $subject= 'Reset User Password';
        $message= 'Plz click the following link to reset your password.<br><a href="'.$reset_link.'">Click Here</a>';

        Mail::to($user->email)->send(new Websitemail( $subject, $message)); 
        return redirect()->route('user_login')->with('success','We have sent a password reset link to reset password.');
    }
    public function reset_password($email, $token){
        $user= User::where('email', $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('user_login')->with('error','Email or Token is not valid');
        }
        return view('user.reset-password',compact(['email','token']));
    }
    
    public function reset_password_submit(Request $request, $email, $token){
        $request->validate([
            'password'=> ['required'],
            'confirm_password'=> ['required','same:password'],
        ]);

        $user= User::where('email', $email)->where('token', $token)->first();
        $user->password= bcrypt($request->password);
        $user->token="";
        $user->save();
        return redirect()->route('user_login')->with('success','Password reset successfully, plz login with new password.');
        
    }

}
