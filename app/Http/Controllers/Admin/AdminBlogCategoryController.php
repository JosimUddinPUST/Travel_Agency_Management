<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Post;

class AdminBlogCategoryController extends Controller
{
    public function index()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog_category.index',compact('blog_categories'));
    }

    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $blog_category = new BlogCategory();
        $blog_category->name = $request->name;
        $blog_category->slug = $request->slug;
        $blog_category->save();
        return redirect()->route('admin_blog_category_index')->with('success','Blog Category Created Successfully');
    }

    public function edit($id)
    {
        $blog_category = BlogCategory::find($id);
        return view('admin.blog_category.edit',compact('blog_category'));
    }

    public function edit_submit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $blog_category = BlogCategory::find($id);
        $blog_category->name = $request->name;
        $blog_category->slug = $request->slug;
        $blog_category->save();
        return redirect()->route('admin_blog_category_index')->with('success','Blog Category Updated Successfully');
    }

    public function delete($id)
    {
        $posts= Post::where('blog_category_id',$id)->count();
        if($posts>0)
        {
            return redirect()->route('admin_blog_category_index')->with('error','This Category has Posts. So, it can not be deleted');
        }
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
        return redirect()->route('admin_blog_category_index')->with('success','Blog Category Deleted Successfully');
    }
}
