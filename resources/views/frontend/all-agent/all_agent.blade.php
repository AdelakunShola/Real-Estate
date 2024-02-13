@extends('frontend.frontend_dashboard')
@section('main')

@php
$agents = App\Models\User::where('status','active')->where('role','agent')->orderBy('id','DESC')->latest()->paginate(8);
$property = App\Models\Property::where('status','1')->where('featured','1')->latest()->get();

 @endphp

 <!--Page Title-->

        <section class="cta-section page-title centred  bg-color-2">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Agents List Page</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Agents List Page</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- agents-page-section -->
        <section class="agents-page-section agents-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar agent-sidebar">
                            <div class="agents-search sidebar-widget">
                                <div class="widget-title">
                                    <h5>Find Agent</h5>
                                </div>
                                <div class="search-inner">
                                    <form action="agents-list.html">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Enter Agent Name" required="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select class="wide">
                                                   <option data-display="All Cities">All Cities</option>
                                                   <option value="1">New York</option>
                                                   <option value="2">California</option>
                                                   <option value="3">London</option>
                                                   <option value="4">Maxico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="theme-btn btn-one">Search Agent</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            @include('frontend.home.feature_sidebar')



                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="agents-content-side">
                            
                        <div class="wrapper list">
                                <div class="agents-list-content list-item">
                                @foreach($agents as $item)
                                    <div class="agents-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box"><img src="{{ (!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width:270px; height:330px;" alt=""></figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4><a href="{{ route('agent.details',$item->id) }}">{{ $item->name }}</a></h4>
                                                        <span class="designation">{{ $item->username }}</span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <ul class="info clearfix">
                                                    <li><i class="fab fa fa-envelope"></i><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                                                    <li><i class="fab fa fa-phone"></i><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></li>
                                                </ul>
                                                <div class="btn-box">
                                                    <a href="{{ route('agent.details',$item->id) }}" class="theme-btn btn-two">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach 
                                    
                                </div>
                                
                            </div>
                            <div class="pagination-wrapper">
                           {{ $agents->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- agents-page-section end -->


         <!-- subscribe-section -->
       @include('frontend.home.subscribe')
       
       <!-- subscribe-section end -->
      

        @endsection