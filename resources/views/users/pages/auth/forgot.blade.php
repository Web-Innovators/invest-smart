@extends('users.layouts.layout')

@section('title', 'Password | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Forgot Passsword</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Forgot Passsword</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
    <!-- Start Slider Area -->
    <div class="login-area page-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="login-page">
                        <div class="login-form">
                            <h4 class="login-title">Forgot Passsword</h4>
                            <div class="row">
                                <form id="signupForm" method="POST" action="{{ route('forgot.post') }}" class="log-form">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="User email" required data-error="Please enter your email">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="submit" class="login-btn">Submit</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="clear"></div>
                                        <div class="sign-icon">
                                            <div class="acc-not">Already have account! <a href="{{ route('login.get') }}">
                                                    Login</a>
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
    <!-- all js here -->
@endsection
