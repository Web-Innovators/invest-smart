@extends('users.layouts.layout')

@section('title', 'Home | Invest Smart')

@section('main-content')

    <!-- Start Intro Area -->
    <div class="slide-area fix" data-stellar-background-ratio="0.6">
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- Start Slider content -->
                            <div class="slide-content text-center">
                                <h2 class="title2">Invest Smart, Earn Daily</h2>
                                <p class="subtitle">Maximize your wealth with our secure investment plans.
                                    Enjoy daily returns, referral rewards, and hassle-free withdrawals.
                                    Start your journey today!</p>
                                <div class="layer-1-3">
                                    <a href="#" class="ready-btn left-btn">Get started</a>
                                    <div class="video-content">
                                        <a href="https://www.youtube.com/watch?v=O33uuBh6nXA" class="video-play vid-zone">
                                            <i class="fa fa-play"></i>
                                            <span>watch video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Slider content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div>
        <style>
            #imageCropped {
                max-width: 100%;
                display: none;
            }
        </style>
        <input type="file" id="imageInput" accept="image/*">
        <img id="imageCropped" style="width: 200px; height:200px;">

        <button onclick="extractText()">Extract Text</button>
        <p id="output"></p>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tesseract.js/4.1.1/tesseract.min.js"></script>

        <script>
            let cropper;

            document.getElementById('imageInput').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(event) {
                    const image = document.getElementById('imageCropped');
                    image.src = event.target.result;
                    image.style.display = 'block';

                    if (cropper) cropper.destroy(); // Destroy previous cropper if exists

                    cropper = new Cropper(image, {
                        aspectRatio: NaN,
                        viewMode: 1
                    });
                };
                reader.readAsDataURL(file);
            });

            async function extractText() {
                if (!cropper) {
                    alert('Please select and crop an image first!');
                    return;
                }

                const canvas = cropper.getCroppedCanvas();
                if (!canvas) {
                    alert('Could not crop the image!');
                    return;
                }

                const imageData = canvas.toDataURL(); // Get cropped image data

                document.getElementById('output').innerText = 'Extracting text... Please wait.';

                try {
                    const {
                        data: {
                            text
                        }
                    } = await Tesseract.recognize(
                        imageData,
                        'eng', // Language: English
                        {
                            logger: m => console.log(m) // Optional: log progress
                        }
                    );

                    document.getElementById('output').innerText = text || 'No text found!';
                } catch (error) {
                    console.error(error);
                    document.getElementById('output').innerText = 'Failed to extract text. Please try again.';
                }
            }
        </script>
    </div> --}}


    <!-- Start Count area -->
    <div class="counter-area fix area-padding-2">
        <div class="container">
            <!-- Start counter Area -->
            <div class="row">
                <div class="fun-content">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <span class="counter-icon"><i class="flaticon-035-savings"></i></span>
                            <span class="counter">$5974544</span>
                            <h4>Total Deposited</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <span class="counter-icon"><i class="flaticon-034-reward"></i></span>
                            <span class="counter">2209</span>
                            <h4>Total Members</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <span class="counter-icon"><i class="flaticon-016-graph"></i></span>
                            <span class="counter">$3974544</span>
                            <h4>Total Payments</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <span class="counter-icon"><i class="flaticon-043-world"></i></span>
                            <span class="counter">80</span>
                            <h4>World Country</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Count area -->
    <!-- Start Invest area -->
    <div class="invest-area bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>The best investment plan</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.
                        </p>
                    </div>
                </div>
            </div>
            @php
                $specificIds = [10, 20, 50, 70, 100, 120, 150, 200]; // Replace with your desired IDs
                $packages = DB::table('share_packages')->limit(12)->get();
                // dd($packages);
            @endphp
            <div class="row">
                <div class="pricing-content">
                    @if (isset($packages))
                        @foreach ($packages as $pkg)
                            @php
                                $sharePrice = DB::table('share_prices')->first();
                                $tprice = $sharePrice->share_price * $pkg->pkg_shares;
                                // dump($packages,$pkg,$tprice);
                            @endphp
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="pri_table_list">
                                    {{-- <span class="base">Best Sale</span> --}}
                                    <div class="top-price-inner">
                                        <div class="rates">
                                            <span class="prices">{{ $pkg->pkg_daily_referral_roi }} %</span><span
                                                class="users">Daily</span>
                                        </div>
                                        <span class="per-day">{{ $pkg->pkg_shares }} Share Package</span>
                                    </div>
                                    <ol class="pricing-text">
                                        <li class="check">Price: $ {{ $tprice }}</li>
                                        <li class="check">Direct Commission: {{ $pkg->pkg_referral_bonus }} %</li>
                                        <li class="check">Daily ROI: {{ $pkg->pkg_daily_referral_roi }} %</li>
                                    </ol>
                                    <div class="price-btn blue">
                                        <a class="blue buyPackage" data-package="{{ $pkg->pkg_shares }}"
                                            data-id="{{ $pkg->id }}" data-price="{{ $tprice }}"
                                            data-bs-toggle="modal" data-bs-target="#buyPkg"
                                            href="javascript:void(0);">Select Package</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            <strong>No Packages Available!</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Invest area -->
    <!-- Start Support-service Area -->
    <div class="support-service-area fix area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Why choose investment plan</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="support-all">
                    <!-- Start About -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services wow ">
                            <a class="support-images" href="#"><i class="flaticon-023-management"></i></a>
                            <div class="support-content">
                                <h4>Expert management</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start About -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services ">
                            <a class="support-images" href="#"><i class="flaticon-036-security"></i></a>
                            <div class="support-content">
                                <h4>Secure investment</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services ">
                            <a class="support-images" href="#"><i class="flaticon-003-approve"></i></a>
                            <div class="support-content">
                                <h4>Registered company</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services">
                            <a class="support-images" href="#"><i class="flaticon-042-wallet"></i></a>
                            <div class="support-content">
                                <h4>Instant withdrawal</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services ">
                            <a class="support-images" href="#"><i class="flaticon-032-report"></i></a>
                            <div class="support-content">
                                <h4>Verified security</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="support-services">
                            <a class="support-images" href="#"><i class="flaticon-024-megaphone"></i></a>
                            <div class="support-content">
                                <h4>Live customer support</h4>
                                <p>Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Support-service Area -->

    <!-- Start Work proses Area -->
    <div class="work-proses fix bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Referral bonus level</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="work-proses-inner text-center">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-proses">
                                    <div class="proses-content">
                                        <div class="proses-icon point-blue">
                                            <span class="point-view">01</span>
                                            <a href="#"><i class="ti-briefcase"></i></a>
                                        </div>
                                        <div class="proses-text">
                                            <h4>Level 01 instant 30% commission</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End column -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-proses">
                                    <div class="proses-content">
                                        <div class="proses-icon point-orange">
                                            <span class="point-view">02</span>
                                            <a href="#"><i class="ti-layers"></i></a>
                                        </div>
                                        <div class="proses-text">
                                            <h4>Level 02 instant 20% commission</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End column -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-proses last-item">
                                    <div class="proses-content">
                                        <div class="proses-icon point-green">
                                            <span class="point-view">03</span>
                                            <a href="#"><i class="ti-bar-chart-alt"></i></a>
                                        </div>
                                        <div class="proses-text">
                                            <h4>Level 03 instant 10% commission</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Work proses Area -->

    <!-- Start Banner Area -->
    <div class="banner-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-all area-80 text-center">
                        <div class="banner-content">
                            <h3>Our investment plan world wide business relations for development</h3>
                            <a class="banner-btn" href="#">Sign up now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->
    <!-- Start Blog Area-->
    <div class="blog-area fix bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Global investment plan news</h3>
                        <p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-grid home-blog">
                    <!-- Start single blog -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b1.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        20 july, 2019
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        13
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>Creative design clients response is better</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        13 may, 2018
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        16
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>Web development is a best work in future world</h4>
                                </a>
                            </div>
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b3.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        24 april, 2019
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        07
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>You can trust me and business with together</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        28 june, 2019
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        32
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>business man want to be benifit any way</h4>
                                </a>
                            </div>
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b4.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b5.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        28 june, 2019
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        32
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>business man want to be benifit any way</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        Admin
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>
                                        28 june, 2019
                                    </span>
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        32
                                    </span>
                                </div>
                                <a href="#">
                                    <h4>business man want to be benifit any way</h4>
                                </a>
                            </div>
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="img/blog/b6.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Blog Area-->
    <!-- Start reviews Area -->
    <div class="reviews-area fix area-padding">
        <div class="container">
            <div class="row">
                <div class="reviews-top">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="testimonial-inner">
                            <div class="review-head">
                                <h3>Our customer say about our company work</h3>
                                <p>The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace
                                    that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum
                                    text is now so widespread and commonplace that many DTP programmes can generate
                                    dummy</p>
                                <a class="reviews-btn" href="review.html">More reviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="reviews-content">
                            <!-- start testimonial carousel -->
                            <div class="testimonial-carousel item-indicator">
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>When replacing a multi-lined selection of text, the generated dummy text
                                                maintains the amount of lines. When replacing a selection. help
                                                agencies.</p>
                                        </div>
                                        <div class="testi-img ">
                                            <img src="img/review/1.jpg" alt="">
                                            <div class="guest-details">
                                                <h4>Hamilton</h4>
                                                <span class="guest-rev">Clients - <a href="#">General
                                                        customer</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>When replacing a multi-lined selection of text, the generated dummy text
                                                maintains the amount of lines. When replacing a selection. help
                                                agencies.</p>
                                        </div>
                                        <div class="testi-img ">
                                            <img src="img/review/2.jpg" alt="">
                                            <div class="guest-details">
                                                <h4>Angel lima</h4>
                                                <span class="guest-rev">Clients - <a href="#">General
                                                        customer</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>When replacing a multi-lined selection of text, the generated dummy text
                                                maintains the amount of lines. When replacing a selection. help
                                                agencies.</p>
                                        </div>
                                        <div class="testi-img ">
                                            <img src="img/review/3.jpg" alt="">
                                            <div class="guest-details">
                                                <h4>Arthur Doil</h4>
                                                <span class="guest-rev">Clients - <a href="#">General
                                                        customer</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>When replacing a multi-lined selection of text, the generated dummy text
                                                maintains the amount of lines. When replacing a selection. help
                                                agencies.</p>
                                        </div>
                                        <div class="testi-img ">
                                            <img src="img/review/4.jpg" alt="">
                                            <div class="guest-details">
                                                <h4>Gabriel Hank</h4>
                                                <span class="guest-rev">Clients - <a href="#">General
                                                        customer</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End reviews Area -->
    <!-- Start FAQ area -->
    <div class="faq-area bg-color area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Some important FAQ</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Column Start -->
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="company-faq">
                        <div class="faq-full">
                            <div class="faq-details">
                                <div class="panel-group" id="accordion">
                                    <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" class="active" data-parent="#accordion"
                                                    href="#check1">
                                                    <span class="acc-icons"></span>How to successful our mission and
                                                    vision
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="check1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p>
                                                    When replacing a multi-lined selection of text, the generated dummy
                                                    text maintains the amount of lines. When replacing a selection of
                                                    text within a single line, the amount of words is roughly being
                                                    maintained.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                    <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                                    <span class="acc-icons"></span>Clients satisfaction make company
                                                    Value.
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="check2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>
                                                    When replacing a multi-lined selection of text, the generated dummy
                                                    text maintains the amount of lines. When replacing a selection of
                                                    text within a single line, the amount of words is roughly being
                                                    maintained.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                    <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                                    <span class="acc-icons"></span>World class creative design and
                                                    development firm.
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="check3" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                <p>
                                                    When replacing a multi-lined selection of text, the generated dummy
                                                    text maintains the amount of lines. When replacing a selection of
                                                    text within a single line, the amount of words is roughly being
                                                    maintained.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                    <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                                    <span class="acc-icons"></span>We are the best online flatform
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="check4" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                <p>
                                                    When replacing a multi-lined selection of text, the generated dummy
                                                    text maintains the amount of lines. When replacing a selection of
                                                    text within a single line, the amount of words is roughly being
                                                    maintained.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                    <!-- Panel Default -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="check-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#check5">
                                                    <span class="acc-icons"></span>Clients satisfaction make company
                                                    Value.
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="check5" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>
                                                    When replacing a multi-lined selection of text, the generated dummy
                                                    text maintains the amount of lines. When replacing a selection of
                                                    text within a single line, the amount of words is roughly being
                                                    maintained.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel Default -->
                                </div>
                            </div>
                            <!-- End FAQ -->
                        </div>
                    </div>
                </div>
                <!-- End Column -->
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="faq-content">
                        <h4>Have a any qustion?</h4>
                        <div class="faq-quote">
                            <div class="row">
                                <form id="chatForm" method="POST" action="{{ url('/chat-post') }}"
                                    class="contact-form">
                                    @csrf
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" id="name" class="form-control" placeholder="Name"
                                         data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        <input type="email" class="email form-control" id="email"
                                            placeholder="Email" data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        <input type="text" id="msg_subject" class="form-control"
                                            placeholder="Subject"
                                            data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea id="input-msg" name="message" rows="7" placeholder="Massage" class="form-control" required
                                            data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                        <button type="submit" id="submit" class="quote-btn">Submit</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Column -->
            </div>
        </div>
    </div>
    <!-- End FAQ area -->
@endsection
