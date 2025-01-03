@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Photo for {{$destination->name}}</h1>
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
                                
                                <form action="{{ route('admin_destination_photo_create_submit',$destination->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Photo</label>
                                            <div><input type="file" name="photo" value="{{ old('photo') }}"></div>
                                        </div>
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

