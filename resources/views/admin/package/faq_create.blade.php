@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Create Package Faq of {{$package->name}}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_package_faq_index',$package->id) }}" class="btn btn-primary"><i class="fas fa-plus">View All</i></a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_package_faq_create_submit',$package->id) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Question</label>
                                        <input type="text" class="form-control" name="question" value="{{ old('question') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Answer</label>
                                        <textarea name="answer" class="form-control editor" cols="30" rows="30">{{ old('answer') }}</textarea>
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

