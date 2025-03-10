@extends('users.layouts.layout')

@section('title', 'Gallery | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Gallery</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->


    <style>
        #gallery {
            padding-top: 40px;
        }

        @media screen and (min-width: 991px) {
            #gallery {
                padding: 60px 30px 0 30px;
            }
        }

        .img-wrapper {
            position: relative;
            margin-top: 15px;
        }

        .img-wrapper img {
            width: 100%;
        }

        .img-overlay {
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
        }

        .img-overlay i {
            color: #fff;
            font-size: 3em;
        }

        #overlay {
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #overlay img {
            margin: 0;
            width: 80%;
            height: auto;
            object-fit: contain;
            padding: 5%;
        }

        @media screen and (min-width: 768px) {
            #overlay img {
                width: 60%;
            }
        }

        @media screen and (min-width: 1200px) {
            #overlay img {
                width: 50%;
            }
        }

        #nextButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
        }

        #nextButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #nextButton {
                font-size: 3em;
            }
        }

        #prevButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
        }

        #prevButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #prevButton {
                font-size: 3em;
            }
        }

        #exitButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
            position: absolute;
            top: 15px;
            right: 15px;
        }

        #exitButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #exitButton {
                font-size: 3em;
            }
        }
    </style>
    <section id="gallery">
        <div class="container">
            <div id="image-gallery">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/500"><img src="https://unsplash.it/500" class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/600"><img src="https://unsplash.it/600" class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/700"><img src="https://unsplash.it/700" class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/800"><img src="https://unsplash.it/800" class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/900"><img src="https://unsplash.it/900" class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/1000"><img src="https://unsplash.it/1000"
                                    class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/1100"><img src="https://unsplash.it/1100"
                                    class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                        <div class="img-wrapper">
                            <a href="https://unsplash.it/1200"><img src="https://unsplash.it/1200"
                                    class="img-responsive"></a>
                            <div class="img-overlay">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- End row -->
            </div><!-- End image gallery -->
        </div><!-- End container -->
    </section>


    
@endsection
