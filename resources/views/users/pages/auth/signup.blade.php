@extends('users.layouts.layout')

@section('title', 'Sign Up | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Register</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Register</li>
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
                            <h4 class="login-title">Create Your Account</h4>
                            <div class="row">
                                <form id="signupForm" action="{{ route('register.post') }}" method="POST" class="log-form">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Full Name" required data-error="Please enter your full name">
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
                                        <input type="text" name="referral" id="referral" class="form-control"
                                            placeholder="Referral Code" required data-error="Referral code is mandatory">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="check-group flexbox">
                                            <label class="check-box">
                                                <input type="checkbox" class="check-box-input" required>
                                                <span class="remember-text">I agree to the Terms & Conditions</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="submit" class="login-btn">Sign Up</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="clear"></div>
                                        <div class="sign-icon">
                                            <div class="acc-not">Already have an account? <a
                                                    href="{{ route('login.get') }}">Login</a>
                                            </div>
                                        </div>
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
