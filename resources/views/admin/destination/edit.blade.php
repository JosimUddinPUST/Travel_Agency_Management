@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Destination</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_destination_edit_submit',$destination->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Exsiting Photo</label>
                                        <div><img src="{{ asset('uploads/'.$destination->featured_photo) }}" alt="No Photo Exist" class="w_200"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Change Featured Photo</label>
                                        <div><input type="file" name="featured_photo"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Destination Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $destination->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{ $destination->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $destination->country }}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Language</label>
                                        <input type="text" class="form-control" name="language" value="{{ $destination->language }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <input type="text" class="form-control" name="currency" value="{{ $destination->currency }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Area</label>
                                        <input type="text" class="form-control" name="area" value="{{ $destination->area }}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Time Zone</label>
                                        <input type="text" class="form-control" name="time_zone" value="{{ $destination->time_zone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Visa</label>
                                        <input type="text" class="form-control" name="visa" value="{{ $destination->visa }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Best Time</label>
                                        <input type="text" class="form-control" name="best_time" value="{{ $destination->best_time }}">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label class="form-label">Map</label>
                                        <input type="text" class="form-control" name="map" value="{{ $destination->map }}">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label class="form-label">View Count</label>
                                        <input type="number" class="form-control" name="view_count" value="{{ $destination->view_count }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Health And Safety</label>
                                        <textarea name="health_safety" class="form-control editor" cols="30" rows="30">{{ $destination->health_safety }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Activities</label>
                                        <textarea name="activities" class="form-control editor" cols="30" rows="30">{{ $destination->activities }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="30">{{ $destination->description }}</textarea>
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

