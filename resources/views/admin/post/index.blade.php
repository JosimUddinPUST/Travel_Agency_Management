@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Posts</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus">Add New</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Category Name</th>
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('uploads/'.$post->photo)}}" class="w_100"></td>
                                                <td>
                                                    {{ $post->blog_category->name }}
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{!! $post->short_description !!}</td>
                                                <td class="pt_10 pb_10" style="width: 100px;">
                                                    <a href="{{ route('admin_post_edit',$post->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_post_delete',$post->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

