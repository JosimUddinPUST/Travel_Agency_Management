<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Destination;

class AdminPackageController extends Controller
{
    public function index()
    {
        // $packages = Package::where('destination_id', $id)->get();
        // $destination = Destination::find($id);
        $packages = Package::orderBy('id', 'desc')->get();
        return view('admin.package.index', compact('packages',));
    }
    public function create()
    {
        $destinations = Destination::orderBy('id', 'desc')->get();
        return view('admin.package.create', compact('destinations'));
    }
    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'destination_id' => 'required',
            'discounted_price' => 'required',
            'original_price' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:packages',
            'map' => 'required',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $package = new Package();
        $package->name = $request->name;
        $package->destination_id = $request->destination_id;
        $package->discounted_price = $request->discounted_price;
        $package->original_price = $request->original_price;
        $package->slug = $request->slug;
        $package->description = $request->description;
        $package->map= $request->map;
        $final_name = 'featured_photo_' . time() . '.' . $request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $final_name);
        $package->featured_photo = $final_name;
        $package->save();
        return redirect()->route('admin_packages_index')->with('success', 'Package Created Successfully');
    }
    public function edit($id)
    {
        $package = Package::find($id);
        $destinations = Destination::orderBy('id', 'desc')->get();
        return view('admin.package.edit', compact('package', 'destinations'));
    }
    public function edit_submit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'destination_id' => 'required',
            'discounted_price' => 'required',
            'original_price' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'map' => 'required',
            'featured_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $package = Package::find($id);
        $package->name = $request->name;
        $package->destination_id = $request->destination_id;
        $package->discounted_price = $request->discounted_price;
        $package->original_price = $request->original_price;
        $package->slug = $request->slug;
        $package->map = $request->map;
        $package->description = $request->description;
        if ($request->hasFile('featured_photo')) {
            $final_name = 'featured_photo_' . time() . '.' . $request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $package->featured_photo = $final_name;
        }
        $package->save();
        return redirect()->route('admin_packages_index')->with('success', 'Package Updated Successfully');
    }
    public function delete($id)
    {
        $package = Package::find($id);
        if ($package->featured_photo != null) {
            unlink(public_path('uploads/' . $package->featured_photo));
        }
        $package->delete();
        return redirect()->route('admin_packages_index')->with('success', 'Package Deleted Successfully');
    }


}
