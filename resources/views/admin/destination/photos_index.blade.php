@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Photos of {{$destination->name}}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All Destinations</i></a>
                    <a href="{{ route('admin_destination_photo_create',$destination->id) }}" class="btn btn-primary"><i class="fas fa-plus">Add New</i></a>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destination_photos as $destination_photo)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('uploads/'.$destination_photo->photo)}}" class="w_100"></td>
                                                
                                                <td class="pt_10 pb_10" style="width: 100px;">
                                                    <a href="{{ route('admin_destination_photo_edit',$destination_photo->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_destination_photo_delete',$destination_photo->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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

