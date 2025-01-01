@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Edit Counter Items</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin_counter_item_edit_submit',$counter_item->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item1 Number</label>
                                                <input type="number" class="form-control" name="item1_number" value="{{ $counter_item->item1_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item1 Title</label>
                                                <input type="text" class="form-control" name="item1_title" value="{{ $counter_item->item1_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item2 Number</label>
                                                <input type="number" class="form-control" name="item2_number" value="{{ $counter_item->item2_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item2 Title</label>
                                                <input type="text" class="form-control" name="item2_title" value="{{ $counter_item->item2_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item3 Number</label>
                                                <input type="number" class="form-control" name="item3_number" value="{{ $counter_item->item3_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item3 Title</label>
                                                <input type="text" class="form-control" name="item3_title" value="{{ $counter_item->item3_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item4 Number</label>
                                                <input type="number" class="form-control" name="item4_number" value="{{ $counter_item->item4_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Counter Item4 Title</label>
                                                <input type="text" class="form-control" name="item4_title" value="{{ $counter_item->item4_title }}">
                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="mb-3 col-md-5">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Show" {{$counter_item->status == 'Show'? 'selected': ''}}>Show</option>
                                            <option value="Hide" {{$counter_item->status == 'Hide'? 'selected' : ''}}>Hide</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"></label>
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

