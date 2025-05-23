@extends('front.layout.master')
@section('main_content')
<div class="page-top" style="background-image: url('{{asset('uploads/banner.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$destination->name}}</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('destinations')}}">Destinations</a></li>
                        <li class="breadcrumb-item active">{{$destination->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="destination-detail pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="main-item mb_50">
                    <div class="main-photo">
                        <img src="{{asset('uploads/'.$destination->featured_photo)}}" alt="No Image">
                    </div>
                </div>
                <div class="main-item mb_50">
                    <h2>
                        Description
                    </h2>
                    <p>{!!$destination->description!!}</p>
                </div>


                <div class="main-item mb_50">
                    <h2>Packages</h2>
                    <div class="package">
                        <div class="row">
                            @foreach($packages as $package)
                            <div class="col-lg-4 col-md-6">
                                <div class="item pb_25">
                                    <div class="photo">
                                        <a href="{{route('package_details',$package->slug)}}"><img src="{{asset('uploads/'.$package->featured_photo)}}" alt="No Image"></a>
                                        <div class="wishlist">
                                            <a href=""><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <div class="price">
                                            ${{$package->discounted_price}} <del>${{$package->original_price}}</del>
                                        </div>
                                        <h2>
                                            <a href="{{route('package_details',$package->slug)}}">{{$package->name}}</a>
                                        </h2>
                                        <div class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            (4 Reviews)
                                        </div>
                                        <div class="element">
                                            <div class="element-left">
                                                <i class="fas fa-plane-departure"></i> Italy
                                            </div>
                                            <div class="element-right">
                                                <i class="fas fa-calendar-alt date-icon"></i> 10 Jan, 2025
                                            </div>
                                        </div>
                                        <div class="element">
                                            <div class="element-left">
                                                <i class="fas fa-users"></i> 25 Persons
                                            </div>
                                            <div class="element-right">
                                                <i class="fas fa-clock"></i> 5 Days
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="item pb_25">
                                    <div class="photo">
                                        <a href="package.html"><img src="uploads/package-1.jpg" alt=""></a>
                                        <div class="wishlist">
                                            <a href=""><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <div class="price">
                                            $150 <del>$250</del>
                                        </div>
                                        <h2>
                                            <a href="package.html">Venice Grand Canal</a>
                                        </h2>
                                        <div class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            (4 Reviews)
                                        </div>
                                        <div class="element">
                                            <div class="element-left">
                                                <i class="fas fa-plane-departure"></i> Italy
                                            </div>
                                            <div class="element-right">
                                                <i class="fas fa-calendar-alt date-icon"></i> 14 Jun, 2024
                                            </div>
                                        </div>
                                        <div class="element">
                                            <div class="element-left">
                                                <i class="fas fa-users"></i> 25 Persons
                                            </div>
                                            <div class="element-right">
                                                <i class="fas fa-clock"></i> 7 Days
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>


                <div class="main-item mb_50">
                    <h2>
                        Information
                    </h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Country</b></td>
                                    <td>{{$destination->country}}</td>
                                </tr>
                                <tr>
                                    <td><b>Visa Requirements</b></td>
                                    <td>{!!$destination->visa!!}</td>
                                </tr>
                                <tr>
                                    <td><b>Languages Spoken</b></td>
                                    <td>{{$destination->language }}</td>
                                </tr>
                                <tr>
                                    <td><b>Currency Used</b></td>
                                    <td>{{$destination->currency }}</td>
                                </tr>
                                <tr>
                                    <td><b>Activities</b></td>
                                    <td>{!!$destination->activities!!}</td>
                                </tr>
                                <tr>
                                    <td><b>Best Time to Visit</b></td>
                                    <td>{!! $destination->best_time !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Health and Safety</b></td>
                                    <td>{!!$destination->health_safety!!}</td>
                                </tr>
                                <tr>
                                    <td><b>Area (km2)</b></td>
                                    <td>{{$destination->area}}</td>
                                </tr>
                                <tr>
                                    <td><b>Time Zone</b></td>
                                    <td>{{$destination->time_zone }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="main-item mb_50">
                    <h2>
                        Photos
                    </h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach($destination_photos as $destination_photo)
                            <div class="col-md-6 col-lg-3">
                                <div class="item">
                                    <a href="{{asset('uploads/'.$destination_photo->photo)}}" class="magnific">
                                        <img src="{{asset('uploads/'.$destination_photo->photo)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="main-item mb_50">
                    <h2>
                        Videos
                    </h2>
                    <div class="video-all">
                        <div class="row">
                            @foreach($destination_videos as $destination_video)
                            <div class="col-md-6 col-lg-6">
                                <div class="item">
                                    <a class="video-button" href="http://www.youtube.com/watch?v={{$destination_video->video_id}}">
                                        <img src="http://img.youtube.com/vi/{{$destination_video->video_id}}/0.jpg" alt="">
                                        <div class="icon">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="main-item">
                    <h2>Map</h2>
                    <div class="location-map">
                        @if(!empty($destination->map))
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58664512.4038767!2d133.417012!3d-26.177229!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sbd!4v1735896815071!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <p>Map is not available.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>   
@endsection