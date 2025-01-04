@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Package Faqs of {{$package->name}}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_packages_index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back To Previous</a>
                    <a href="{{ route('admin_package_faq_create',$package->id) }}" class="btn btn-primary"><i class="fas fa-plus">Add New</i></a>
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
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($package_faqs as $package_faq)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $package_faq->question }}</td>
                                                <td>{!!$package_faq->answer!!}</td>
                                                <td class="pt_10 pb_10" style="width: 150px;">
                                                    <a href="{{ route('admin_package_faq_edit',$package_faq->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_package_faq_delete',$package_faq->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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

