@extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About Us</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@if($welcome_item->status=="Show")
<div class="special pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="inner">
                                    <h3>{{$welcome_item->heading}}</h3>
                                    <p> {!!$welcome_item->text!!} </p>
                                    <div class="button-style-1 mt_20">
                                        <a href="{{$welcome_item->button_link}}">{{$welcome_item->button_text}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-side" style="background-image: url(uploads/{{$welcome_item->photo}});">
                                <a class="video-button" href="https://www.youtube.com/watch?v={{$welcome_item->video}}"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<div class="why-choose pt_70">
    <div class="container">
        <div class="row">
            @foreach($features as $feature)
            <div class="col-md-4">
                <div class="inner pb_70">
                    <div class="icon">
                        <i class="{{$feature->icon}}"></i>
                    </div>
                    <div class="text">
                        <h2>{{$feature->heading}}</h2>
                        <p>
                            {!!$feature->text!!}    
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@if($counter_item->status=="Show")
<div class="counter-section pt_70 pb_70">
    <div class="container">
        <div class="row counter-items">
            <div class="col-md-3 counter-item">
                <div class="counter">{{$counter_item->item1_number}}</div>
                <div class="text">{{$counter_item->item1_title}}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{$counter_item->item2_number}}</div>
                <div class="text">{{$counter_item->item2_title}}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{$counter_item->item3_number}}</div>
                <div class="text">{{$counter_item->item3_title}}</div>
            </div>
            <div class="col-md-3 counter-item">
                <div class="counter">{{$counter_item->item4_number}}</div>
                <div class="text">{{$counter_item->item4_title}}</div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection