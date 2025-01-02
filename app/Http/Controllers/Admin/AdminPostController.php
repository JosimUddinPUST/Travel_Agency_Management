<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\BlogCategory;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->with('blog_category')->get();
        
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('id','desc')->get();
        return view('admin.post.create',compact('categories'));
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'blog_category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->blog_category_id = $request->blog_category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->short_description = $request->short_description;

        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $post->photo = $final_name;
        $post->save();
        return redirect()->route('admin_post_index')->with('success','Post Created Successfully');

    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = BlogCategory::orderBy('id','desc')->get();
        return view('admin.post.edit',compact('post','categories'));
    }
    public function edit_submit(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:posts,slug,'.$id,
            'blog_category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->blog_category_id = $request->blog_category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->short_description = $request->short_description;

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            if(file_exists(public_path('uploads/'.$post->photo)))
            {
                unlink(public_path('uploads/'.$post->photo));
            }
            $final_name = 'post_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $post->photo = $final_name;
        }

        $post->save();
        return redirect()->route('admin_post_index')->with('success','Post Updated Successfully');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if(file_exists(public_path('uploads/'.$post->photo)))
        {
            unlink(public_path('uploads/'.$post->photo));
        }
        $post->delete();
        return redirect()->route('admin_post_index')->with('success','Post Deleted Successfully');
    }

}
