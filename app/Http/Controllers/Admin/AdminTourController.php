<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Package;
use App\Models\Booking;

class AdminTourController extends Controller
{
    public function index(){
        $tours=Tour::get();
        return view("admin.tour.index",compact('tours'));
    }
    public function create(){
        $packages=Package::get();
        return view("admin.tour.create",compact('packages'));
    }
    public function create_submit(Request $request){
        $request->validate([
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
            'total_seats' => 'required|numeric',
        ]);
        $tour=new Tour();
        $tour->package_id=$request->package_id;
        $tour->tour_start_date=$request->tour_start_date;
        $tour->tour_end_date=$request->tour_end_date;
        $tour->booking_end_date=$request->booking_end_date;
        $tour->total_seats=$request->total_seats;
        $tour->save();
        return redirect()->route('admin_tour_index')->with('success','Tour created successfully');
    }
    public function edit($id){
        $tour=Tour::find($id);
        $packages=Package::get();
        return view("admin.tour.edit",compact('tour','packages'));
    }
    public function edit_submit(Request $request,$id){
        $tour=Tour::find($id);
        $request->validate([
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
            'total_seats' => 'required|numeric',
        ]);
        $tour->package_id=$request->package_id;
        $tour->tour_start_date=$request->tour_start_date;
        $tour->tour_end_date=$request->tour_end_date;
        $tour->booking_end_date=$request->booking_end_date;
        $tour->total_seats=$request->total_seats;
        $tour->save();
        return redirect()->route('admin_tour_index')->with('success','Tour updated successfully');
    }
    public function delete($id){
        $tour=Tour::find($id);
        $tour->delete();
        return redirect()->route('admin_tour_index')->with('success','Tour deleted successfully');
    }
    public function tour_booking($tour_id,$package_id){
        // dd($tour_id,$package_id);
        $all_data=Booking::with('user')->where('tour_id',$tour_id)->where('package_id',$package_id)->get();
        return view('admin.tour.booking',compact('all_data'));

    }
    public function tour_booking_delete($id) {
        $booking= Booking::where('id',$id)->first();
        $booking->delete();
        return redirect()->back()->with('success','Booking is deleted successfully.');
    }
}
