@extends('frontend.frontend_dashboard')
@section('main')

@php
$testimonial = App\Models\Testimonial::latest()->get();
$partners = App\Models\Partner::latest()->get();
$services = App\Models\OurService::latest()->get();
@endphp


 <!--Page Title-->
<section class="cta-section page-title centred  bg-color-2">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
            <div class="auto-container">                     
                <div class="content-box clearfix">
                    <h1>About Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>


        <!--End Page Title-->


        <!-- about-section -->
        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="{{$about->image}}" alt=""></figure>
                                    <div class="text wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <h2>{{ $about->yofexperience }}</h2>
                                        <h4>Years of <br />Experience</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <h5>About</h5>
                                        <h2>{{ $about->title }}</h2>
                                    </div>
                                    <div class="text">
                                    {!! $about->desc !!}
                                    </div>
                                   
                                    <div class="btn-box">
                                        <a href="{{ route('contact.us') }}" class="theme-btn btn-one">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- feature-style-three -->
        <section class="feature-style-three centred pb-110">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Services</h5>
                    <h2>Property Services</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">

                @foreach ($services as $item)
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="{{ $item->icon}}"></i></div>
                            <h4>{{ $item->title}}</h4>
                            <p>{{ $item->short_desc}}</p>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </section>
        <!-- feature-style-three end -->


        <!-- cta-section -->
      @include('frontend.home.cta')
        <!-- cta-section end -->
      


        <!-- funfact-section -->
        <section class="funfact-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="1270">0</span>
                                    </div> 
                                    <p>Total Professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2350">0</span>
                                    </div>
                                    <p>Total Property Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2540">0</span>
                                    </div>
                                    <p>Total Property Rent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="8270">0</span>
                                    </div>
                                    <p>Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-section end -->


        <!-- testimonial-style-four -->
        <section class="testimonial-style-four sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                <h5>Testimonials</h5>
<h2>What They Say About Us</h2>
<p>Discover why our clients rave about us. Read their testimonials and experience excellence in real estate services. <br>Your satisfaction is our priority.</p>

                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">

                @foreach($testimonial as $item)
                    
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>{{$item->message}}</h4>
                            <h5>{{$item->name}}</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- testimonial-style-four end -->


        <!-- clients-section -->
       
     

        <section class="team-section sec-pad centred bg-color-1">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png') }});"></div>
            <div class="">
                <div class="sec-title">
                    <h5>Our Partners</h5>
                   
                </div>
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    @foreach($partners as $item)
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="clients-logo">
                            <ul class="logo-list clearfix">
                            <li>
                                <figure class="image-box"><img src="{{ $item->image }}" alt="" style="width:370px; height:170px;" ></figure>
                            </li>
                            </ul>
                            </div>
                        </div>
                        @endforeach               
                                        
                                    </div>
                                </div>
                            </section>
                               <!-- clients-section end -->


                         


       


        <!-- download-section -->
        @include('frontend.home.download')
        <!-- download-section end -->


@endsection