@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Package</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_packages_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_package_edit_submit',$package->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Exsiting Featured Photo</label>
                                        <div><img src="{{ asset('uploads/'.$package->featured_photo) }}" alt="No Photo Exist" class="w_200"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Featured Photo</label>
                                        <div><input type="file" name="featured_photo"></div>
                                    </div> 
                                    <div class="mb-3">
                                        <label class="form-label">Exsiting Banner Photo</label>
                                        <div><img src="{{ asset('uploads/'.$package->banner_photo) }}" alt="No Photo Exist" class="w_200"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Banner Photo</label>
                                        <div><input type="file" name="banner_photo"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Package Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $package->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{  $package->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Map</label>
                                        <textarea name="map" class="form-control" cols="30" rows="30">{{ $package->map }}</textarea>
                                    </div>                              
                                    <div class="mb-3">
                                        <label class="form-label">Discounted Price</label>
                                        <input type="number" class="form-control" name="discounted_price" value="{{ $package->discounted_price }}">
                                    </div>                            
                                    <div class="mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input type="number" class="form-control" name="original_price" value="{{ $package->original_price }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control editor" cols="30" rows="30">{{ $package->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" >Select Destination</label>
                                        <select class="form-select" name="destination_id">
                                            @foreach ($destinations as $destination)
                                                <option value="{{ $destination->id }}" @if($package->destination_id==$destination->id) selected @endif>
                                                    {{ $destination->name }}
                                                </option>
                                            @endforeach
                                        </select>
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

