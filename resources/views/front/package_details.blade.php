@extends('front.layout.master')
@section('main_content')
<div class="page-top page-top-package" style="background-image: url('{{asset('uploads/'.$package->banner_photo)}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$package->name}}</h2>
                <h3><i class="fas fa-plane-departure"></i> {{$package->destination->name}}</h3>
                <div class="review">
                    <div class="set">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span>(4.2 out of 5)</span>
                </div>
                <div class="price">
                    ${{$package->discounted_price}} <del>${{$package->original_price}}</del>
                </div>
                <div class="person">
                    per person
                </div>
            </div>
        </div>
    </div>
</div>


<div class="package-detail pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">


                <div class="main-item mb_50">

                    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tab-1-pane" type="button" role="tab" aria-controls="tab-1-pane" aria-selected="true">Detail</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            {{-- <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tab-2-pane" type="button" role="tab" aria-controls="tab-2-pane" aria-selected="false">Tour Plan</button> --}}
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#tab-3-pane" type="button" role="tab" aria-controls="tab-3-pane" aria-selected="false">Location</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            {{-- <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tab-4-pane" type="button" role="tab" aria-controls="tab-4-pane" aria-selected="false">Gallery</button> --}}
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-5" data-bs-toggle="tab" data-bs-target="#tab-5-pane" type="button" role="tab" aria-controls="tab-5-pane" aria-selected="false">FAQ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            {{-- <button class="nav-link" id="tab-6" data-bs-toggle="tab" data-bs-target="#tab-6-pane" type="button" role="tab" aria-controls="tab-6-pane" aria-selected="false">Review</button> --}}
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-7" data-bs-toggle="tab" data-bs-target="#tab-7-pane" type="button" role="tab" aria-controls="tab-7-pane" aria-selected="false">Enquery</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-8" data-bs-toggle="tab" data-bs-target="#tab-8-pane" type="button" role="tab" aria-controls="tab-8-pane" aria-selected="false">Booking</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="tab-1-pane" role="tabpanel" aria-labelledby="tab-1" tabindex="0">
                            <!-- Detail -->
                            <h2 class="mt_30">Detail</h2>
                            <p>{!!$package->description!!}</p>

                            <h2 class="mt_30">Includes</h2>
                            <div class="amenity">
                                <div class="row">
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Swimming Pool
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Mountain Bike
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Sightseeing
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Free Wifi
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Personal Guide
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Entrance Fees
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Air fares
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-check"></i> Accommodation
                                    </div>
                                </div>
                            </div>

                            <h2 class="mt_30">Excludes</h2>
                            <div class="amenity">
                                <div class="row">
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-times"></i> Departure Taxes
                                    </div>
                                    <div class="col-lg-3 mb_15">
                                        <i class="fas fa-times"></i> Festival & Events
                                    </div>
                                </div>
                            </div>
                            <!-- // Detail -->
                        </div>

                        {{-- <div class="tab-pane fade" id="tab-2-pane" role="tabpanel" aria-labelledby="tab-2" tabindex="0">
                            <!-- Tour Plan -->
                            <h2 class="mt_30">Tour Plan</h2>
                            <div class="tour-plan">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b>Day 1</b></td>
                                            <td>
                                                <b>Morning:</b><br>
                                                1. Arrive at Cairns or Port Douglas and check into your hotel.<br>
                                                2. Welcome meeting with the tour guide and fellow travelers.<br>

                                                <b>Afternoon</b><br>
                                                1. Lunch at a local restaurant.<br>
                                                2. Visit the Cairns Aquarium to get an introduction to the marine life of the Great Barrier Reef.<br>

                                                <b>Evening</b><br>
                                                1. Free time to explore the local area.<br>
                                                2. Welcome dinner at the hotel, with an overview of the tour itinerary and reef conservation briefing.<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Day 2</b></td>
                                            <td>
                                                <b>Morning: </b><br>
                                                1. Early breakfast at the hotel.<br>
                                                2. Depart for the Great Barrier Reef on a comfortable catamaran.<br>
                                                3. Safety briefing and equipment fitting for snorkeling and diving.<br>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- // Tour Plan -->
                        </div> --}}

                        <div class="tab-pane fade" id="tab-3-pane" role="tabpanel" aria-labelledby="tab-3" tabindex="0">
                            <!-- Location -->
                            <h2 class="mt_30">Location Map</h2>
                            <div class="location-map">
                                <iframe src="{{$package->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- // Location -->
                        </div>

                        {{-- <div class="tab-pane fade" id="tab-4-pane" role="tabpanel" aria-labelledby="tab-4" tabindex="0">
                            <!-- Gallery -->
                            <h2 class="mt_30">
                                Photos
                            </h2>
                            <div class="photo-all">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-1.jpg" class="magnific">
                                                <img src="uploads/package-thumb-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-2.jpg" class="magnific">
                                                <img src="uploads/package-thumb-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-3.jpg" class="magnific">
                                                <img src="uploads/package-thumb-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-4.jpg" class="magnific">
                                                <img src="uploads/package-thumb-4.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-5.jpg" class="magnific">
                                                <img src="uploads/package-thumb-5.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-6.jpg" class="magnific">
                                                <img src="uploads/package-thumb-6.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-7.jpg" class="magnific">
                                                <img src="uploads/package-thumb-7.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item">
                                            <a href="uploads/package-thumb-8.jpg" class="magnific">
                                                <img src="uploads/package-thumb-8.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h2 class="mt_30">
                                Videos
                            </h2>
                            <div class="video-all">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="item">
                                            <a class="video-button" href="http://www.youtube.com/watch?v=kLuqCtnKr_8">
                                                <img src="http://img.youtube.com/vi/kLuqCtnKr_8/0.jpg" alt="">
                                                <div class="icon">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="bg"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="item">
                                            <a class="video-button" href="http://www.youtube.com/watch?v=HRg1gJi6yqc">
                                                <img src="http://img.youtube.com/vi/HRg1gJi6yqc/0.jpg" alt="">
                                                <div class="icon">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="bg"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Gallery -->
                        </div> --}}


                        <div class="tab-pane fade" id="tab-5-pane" role="tabpanel" aria-labelledby="tab-5" tabindex="0">
                            <!-- FAQ -->
                            <h2 class="mt_30">Frequently Asked Questions</h2>
                            <div class="faq-package">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($package_faqs as $package_faq)
                                    <div class="accordion-item mb_30">
                                        <h2 class="accordion-header" id="heading_{{$package_faq->id}}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$package_faq->id}}" aria-expanded="false" aria-controls="collapse_{{$package_faq->id}}">{{$package_faq->question}}
                                            </button>
                                        </h2>
                                        <div id="collapse_{{$package_faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$package_faq->id}}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!!$package_faq->answer!!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- // FAQ -->
                        </div>


                        {{-- <div class="tab-pane fade" id="tab-6-pane" role="tabpanel" aria-labelledby="tab-6" tabindex="0">
                            <!-- Review -->
                            <div class="review-package">

                                <h2>Reviews (2)</h2>

                                <div class="review-package-section">
                                    <div class="review-package-box d-flex justify-content-start">
                                        <div class="left">
                                            <img src="uploads/team-2.jpg" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="name">John Doe</div>
                                            <div class="date">September 25, 2022</div>
                                            <div class="text">
                                                Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-package-section">
                                    <div class="review-package-box d-flex justify-content-start">
                                        <div class="left">
                                            <img src="uploads/team-1.jpg" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="name">John Doe</div>
                                            <div class="date">September 25, 2022</div>
                                            <div class="text">
                                                Qui ea oporteat democritum, ad sed minimum offendit expetendis. Idque volumus platonem eos ut, in est verear delectus. Vel ut option adipisci consequuntur. Mei et solum malis detracto, has iuvaret invenire inciderint no. Id est dico nostrud invenire.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt_40"></div>

                                <h2>Leave Your Review</h2>

                                <div class="mb-3">
                                    <div class="give-review-auto-select">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', (event) => {
                                            const stars = document.querySelectorAll('.star-rating label');
                                            stars.forEach(star => {
                                                star.addEventListener('click', function() {
                                                    stars.forEach(s => s.style.color = '#ccc');
                                                    this.style.color = '#f5b301';
                                                    let previousStar = this.previousElementSibling;
                                                    while(previousStar) {
                                                        if (previousStar.tagName === 'LABEL') {
                                                            previousStar.style.color = '#f5b301';
                                                        }
                                                        previousStar = previousStar.previousElementSibling;
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" placeholder="Comment"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- // Review -->
                        </div> --}}



                        <div class="tab-pane fade" id="tab-7-pane" role="tabpanel" aria-labelledby="tab-7" tabindex="0">
                            <!-- Enquery -->
                            <h2 class="mt_30">Ask Your Question</h2>
                            <div class="enquery-form">
                                <form action="{{route('enquery_form_submit',$package->id)}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control h-150" name="message" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- // Enquery -->
                        </div>


                        <div class="tab-pane fade" id="tab-8-pane" role="tabpanel" aria-labelledby="tab-8" tabindex="0">
                            <!-- Booking -->
                            <form action="{{route('payment')}}" method="post">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        @php $i=0; @endphp
                                        @foreach ($tours as $tour)
                                        @if($tour->booking_end_date < date('Y-m-d'))
                                            @continue
                                        @endif
                                        @php 
                                        $i++; 
                                        $all_data=App\Models\Booking::where('tour_id',$tour->id)->where('package_id',$package->id)->get();
                                        $total_booked_seats=0;
                                        foreach($all_data as $data)
                                        {
                                            $total_booked_seats+=$data->total_person;
                                        }
                                        @endphp
                                        <h2 class="mt_30">
                                            <input type="radio" name="tour_id" value="{{$tour->id}}" @if($i==1) checked @endif>
                                            Tour-{{$i}} 
                                        </h2>
                                        <div class="summary">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td><b>Price (per person)</b></td>
                                                            <td>${{$package->discounted_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b> Tour Start Date</b></td>
                                                            <td>
                                                                {{$tour->tour_start_date}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Tour End Date</b></td>
                                                            <td>
                                                                {{$tour->tour_end_date}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Booking End Date</b></td>
                                                            <td class="text-danger">
                                                                {{$tour->booking_end_date}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Total Seats</b></td>
                                                            <td>
                                                                @if($tour->total_seats==-1)
                                                                Unlimited
                                                                @else
                                                                {{$tour->total_seats}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Booked Seat</b></td>
                                                            <td>
                                                                {{$total_booked_seats}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Available Seats</b></td>
                                                            <td>
                                                                @if($tour->total_seats==-1)
                                                                Unlimited
                                                                @else
                                                                {{
                                                                    $tour->total_seats - $total_booked_seats
                                                                }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="col-md-4">
                                        <h2 class="mt_30">Payment</h2>
                                        <div class="summary">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="ticket_price" id="ticketPrice" value="{{$package->discounted_price}}">
                                                            <label for=""><b>Number of Persons</b></label>
                                                            <input type="number" min="1" max="1000" name="total_person" class="form-control" value="1" id="numPersons" oninput="calculateTotal()">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for=""><b>Total</b></label>
                                                            <input type="text" name="" class="form-control" id="totalAmount" value="${{$package->discounted_price}}" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for=""><b>Select Payment Method</b></label>
                                                            <select name="" class="form-select">
                                                                <option value="">PayPal</option>
                                                                <option value="">Stripe</option>
                                                            </select>
                                                        </td>
                                                    </tr>   

                                                    @if (Auth::guard('web')->check())
                                                    <tr>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Pay Now</button>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <td>
                                                        <a href="{{route('user_login')}}" class="btn btn-primary">Login to Book</a>
                                                    </td>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                        <script>
                                            function calculateTotal() {
                                                const ticketPrice = document.getElementById('ticketPrice').value;
                                                const numPersons = document.getElementById('numPersons').value;
                                                const totalAmount = ticketPrice * numPersons;
                                                document.getElementById('totalAmount').value = `$${totalAmount}`;
                                            }
                                        </script>
                                    </div>
                                </div>
                            </form>
                            <!-- // Booking -->
                        </div>

                    </div>
                    
                </div>
                    

            </div>
        </div>
    </div>
</div>
@endsection