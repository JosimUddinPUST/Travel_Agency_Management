@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Post</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_post_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_post_create_submit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <div><input type="file" name="photo"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <select name="blog_category_id" class="form-select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea name="short_description" class="form-control h_100" cols="30" rows="30">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="30">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

