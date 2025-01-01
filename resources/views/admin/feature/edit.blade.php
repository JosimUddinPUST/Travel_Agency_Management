@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Feature</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_feature_index') }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_feature_edit_submit',$feature->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Exsiting Icon Preview</label>
                                        <div>
                                            <i class="{{ $feature->icon }} fz_30 "></i>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Change Icon</label>
                                        <div><input type="text" value="{{$feature->icon}}" class="form-control" name="icon"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" value="{{ $feature->heading }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Text</label>
                                        <textarea name="text" class="form-control h_100" cols="30" rows="30">{{ $feature->text }}</textarea>
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

