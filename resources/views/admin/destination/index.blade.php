@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Destinations</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_destination_create') }}" class="btn btn-primary"><i class="fas fa-plus">Add New</i></a>
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
                                                <th>Destination Name</th>
                                                <th>Gallary</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('uploads/'.$destination->featured_photo)}}" class="w_100"></td>
                                                <td>
                                                    {{ $destination->name }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin_destination_photos_index',$destination->id) }}" class="btn btn-success btn-sm">Photo Gallary</a><br><br>
                                                    <a href="{{ route('admin_destination_videos_index',$destination->id) }}" class="btn btn-success btn-sm">Video Gallary</a>
                                                    {{-- <a href="" class="btn btn-success btn-sm">Video Gallary</a> --}}
                                                </td>
                                                <td class="pt_10 pb_10" style="width: 100px;">
                                                    <a href="{{ route('admin_destination_edit',$destination->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_destination_delete',$destination->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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

