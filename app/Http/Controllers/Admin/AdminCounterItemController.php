<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CounterItem;

class AdminCounterItemController extends Controller
{
    public function edit(){
        $counter_item= CounterItem::where('id',1)->first();
        return view("admin.counter_item.edit",compact("counter_item"));
    }
    public function edit_submit(Request $request){
        $counter_item= CounterItem::where('id',1)->first();
        $request->validate([
            'item1_number' => ['required','numeric'],
            'item1_title' => ['required','string'],
            'item2_number' => ['required','numeric'],
            'item2_title' => ['required','string'],
            'item3_number' => ['required','numeric'],
            'item3_title' => ['required','string'],
            'item4_number' => ['required','numeric'],
            'item4_title' => ['required','string'],

        ]);
        $counter_item->item1_number=$request->item1_number;
        $counter_item->item1_title=$request->item1_title;
        $counter_item->item2_number=$request->item2_number;
        $counter_item->item2_title=$request->item2_title;
        $counter_item->item3_number=$request->item3_number;
        $counter_item->item3_title=$request->item3_title;
        $counter_item->item4_number=$request->item4_number;
        $counter_item->item4_title=$request->item4_title;
        $counter_item->status=$request->status;
        $counter_item->save();
        return redirect()->back()->with('success','Counter Item Updated Successfully');
    }
}
