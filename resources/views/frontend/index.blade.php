@extends('frontend.main_master') 
@section('main')
<!-- Banner Area -->
<div class="banner-area" style="height: 480px;">
            <div class="container">
                <div class="banner-content">
                    <h1>Discover a Hotel & Resort to Book a Suitable Room</h1>
                    
                     
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Banner Form Area -->
        <div class="banner-form-area">
            <div class="container">
                <div class="banner-form">
                    <form method="get" action="{{ route('booking.search') }}">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>CHECK IN TIME</label>
                                    <div class="input-group">
                                        <input autocomplete ="off" type="text" name="check_in" class="form-control dt_picker" placeholder="yyy-mm-dd">
                                        <span class="input-group-addon"></span>
                                    </div>
                                    <i class='bx bxs-chevron-down'></i>	
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>CHECK OUT TIME</label>
                                    <div class="input-group">
                                        <input autocomplete="off" type="text" name="check_out" class="form-control dt_picker" placeholder="yyy-mm-dd">
                                        <span class="input-group-addon"></span>
                                    </div>
                                    <i class='bx bxs-chevron-down'></i>	
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label>Person</label>
                                    <select  name="person"class="form-control">
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                    </select>	
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <button type="submit" class="default-btn btn-bg-one border-radius-5">
                                    Check Availability 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Banner Form Area End -->

        <!-- Room Area -->
        
        <!-- Room Area End -->
         @include('frontend.home.room_area')
        <!-- Book Area Two-->
         @include('frontend.home.room_area_two')
        <!-- Book Area Two End -->

        <!-- Services Area Three -->
         @include('frontend.home.services')
        <!-- Services Area Three End -->

        <!-- Team Area Three -->
        @include('frontend.home.team')
        <!-- Team Area Three End -->

        <!-- Testimonials Area Three -->
         @include('frontend.home.testimonials')
        <!-- Testimonials Area Three End -->

        <!-- FAQ Area -->
         @include('frontend.home.faq')
        <!-- FAQ Area End -->

        <!-- Blog Area -->
         @include('frontend.home.blog')
        <!-- Blog Area End --> 
@endsection 