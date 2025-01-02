<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index(){
        $faqs=Faq::get();
        return view("admin.faq.index",compact('faqs'));
    }
    public function create(){
        return view("admin.faq.create");
    }
    public function create_submit(Request $request){
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq=new Faq();
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->save();
        return redirect()->route('admin_faq_index')->with('success','Faq created successfully');
    }
    public function edit($id){
        $faq=Faq::find($id);
        return view("admin.faq.edit",compact('faq'));
    }
    public function edit_submit(Request $request,$id){
        $faq=Faq::find($id);
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->save();
        return redirect()->route('admin_faq_index')->with('success','Faq updated successfully');
    }
    public function delete($id){
        $faq=Faq::find($id);
        $faq->delete();
        return redirect()->route('admin_faq_index')->with('success','Faq deleted successfully');
    }
}
