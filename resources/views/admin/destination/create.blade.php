@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Destination</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_destination_create_submit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Featured Photo</label>
                                        <div><input type="file" name="featured_photo"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Destination Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Language</label>
                                        <input type="text" class="form-control" name="language" value="{{ old('language') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <input type="text" class="form-control" name="currency" value="{{ old('currency') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Area</label>
                                        <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Time Zone</label>
                                        <input type="text" class="form-control" name="time_zone" value="{{ old('time_zone') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Visa</label>
                                        <input type="text" class="form-control" name="visa" value="{{ old('visa') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Best Time</label>
                                        <input type="text" class="form-control" name="best_time" value="{{ old('best_time') }}">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label class="form-label">Map</label>
                                        <input type="text" class="form-control" name="map" value="{{ old('map') }}">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label class="form-label">View Count</label>
                                        <input type="number" class="form-control" name="view_count" value="{{ old('view_count') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Health And Safety</label>
                                        <textarea name="health_safety" class="form-control editor" cols="30" rows="30">{{ old('health_safety') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Activities</label>
                                        <textarea name="activities" class="form-control editor" cols="30" rows="30">{{ old('activities') }}</textarea>
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

