@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Photo for {{$destination->name}}</h1>
                <div class="ml-auto">
                    
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All Destinations</i></a>
               
                    <a href="{{ route('admin_destination_photos_index',$destination->id) }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_destination_photo_edit_submit',$destination_photo->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Exsiting Photo</label>
                                            <div><img src="{{ asset('uploads/'.$destination_photo->photo) }}" alt="No Photo Exist" class="w_200"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Change Photo</label>
                                                <div><input type="file" name="photo"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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

