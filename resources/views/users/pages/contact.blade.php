@extends('users.layouts.layout')

@section('title', 'Home | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Contact us</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
    <!-- Start contact Area -->
    <div class="contact-area page-padding">
        <div class="container">
            <div class="row">
                <div class="contact-inner">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-mobile"></i>
                                <p>
                                    <a href="tel:+1 (000) 000-0000" style="color: black;">
                                        <h6>+1 (000) 000-0000</h6>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-envelope-o"></i>
                                <p>
                                    <a href="mailto:info@investsmart.com" style="color: black;">
                                        <h6>info@investsmart.com</h6>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    <a href="javascript:void(0);" style="color: black;">
                                        <h6>Lorem Ipsum address</h6>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <div class="map-area">
                        <div id="googleMap" style="width:100%;height:380px;">
                            <iframe width="600" height="440"
                                src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=karachi+(Title)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>
                                #gmap_canvas img {
                                    max-width: none !important;
                                    background: none !important
                                }
                            </style>
                        </div>
                    </div>
                    <!-- End Map -->
                </div>
                <!-- Start Left contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <div class="row">
                            <form id="signupForm" method="POST" action="{{ route('contact.post') }}" class="contact-form">
                                @csrf
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" class="email form-control" id="email"
                                        placeholder="Email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="subject" id="msg_subject" class="form-control"
                                        placeholder="Subject" required data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" name="message" rows="7" placeholder="Massage" class="form-control" required
                                        data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" id="submit" class="add-btn contact-btn">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
@endsection
