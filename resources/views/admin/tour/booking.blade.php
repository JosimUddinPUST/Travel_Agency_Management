@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

    <div class="main-content">
        
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Booking Information</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_tour_index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Previous</a>
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
                                                <th>User Information</th>
                                                <th>Total Person</th>
                                                <th>Paid Amount</th>
                                                <th>Payment Status</th>
                                                <th>Payment Method</th>
                                                <th>Invoice</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>Name:</strong>{{$data->user->name}}<br>
                                                    <strong>Email:</strong>{{$data->user->email}}<br>
                                                    <strong>Phone:</strong>{{$data->user->phone}}<br>
                                                </td>
                                                <td>{{ $data->total_person }}</td>
                                                <td>{{ $data->paid_amount }}</td>
                                                <td>
                                                    @if( $data->payment_status=='completed' )
                                                        <span class="badge bg-success">Paid</span>
                                                    @else
                                                        <span class="badge bg-danger" >Unpaid</span>
                                                    @endif
                                                </td>
                                                <td>{{ $data->payment_method }}</td>
                                                <td>
                                                    {{$data->invoice}}
                                                </td>
                                                <td class="pt_10 pb_10" style="width: 80px;">
                                                    <a href="{{route('admin_tour_booking_delete',$data->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
        </section>a->package_id]
    </div>
@endsection

