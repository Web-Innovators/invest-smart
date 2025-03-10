@extends('users.layouts.layout')

@section('title', 'Passsword | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Reset Passsword</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Reset Passsword</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
    <!-- Start Slider Area -->
    <div class="signup-area page-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="login-page signup-page">
                        <div class="login-form signup-form">
                            <h4 class="login-title">Reset Passsword</h4>
                            <div class="row">
                                <form id="signupForm" method="POST" action="{{ route('reset.post') }}" class="log-form">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="token" name="token"
                                            value="{{ $token }}"  class="form-control" placeholder="Full Name" required
                                            data-error="Please enter your full name">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email Address" required data-error="Please enter a valid email">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password" required data-error="Please enter your password">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="new_password" id="new_password" class="form-control"
                                            placeholder="Password" required data-error="Please enter confirm password">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="submit" class="login-btn">Submit</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
