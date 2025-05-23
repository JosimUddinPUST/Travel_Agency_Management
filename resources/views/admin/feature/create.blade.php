@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Feature</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_feature_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_feature_create_submit') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" class="form-control" name="icon" value="{{ old('icon') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <textarea name="text" class="form-control h_100" cols="30" rows="30">{{ old('text') }}</textarea>
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

