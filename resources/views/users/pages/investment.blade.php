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
                            <h3>Investment Packages</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Investment Packages</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
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
                                        <a class="blue buyPackage" data-package="{{ $pkg->pkg_shares }}" data-id="{{ $pkg->id }}"
                                            data-price="{{ $tprice }}" data-bs-toggle="modal" data-bs-target="#buyPkg"
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
            <div class="row" style="text-align: center; padding: 10px; background: #efefef;">
                <div class="col-lg-12">
                    <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                        style="border-radius:10px;">
                        <div class="text-dark pt-3">
                            {{ $packages->links() }}
                            <!-- paginator -->
                            <div hidden>
                                @if ($packages->lastPage() > 1)
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item {{ $packages->currentPage() == 1 ? ' disabled' : '' }}">
                                            <a class="page-link border_none_pagination"
                                                href="{{ $packages->url($packages->currentPage() - 1) }}">Previous</a>
                                        </li>
                                        @for ($i = $packages->currentPage(); $i <= $packages->currentPage() + 8; $i++)
                                            <li class="page-item">
                                                <a style="background-color:#003d70; border-color: #003d70;"
                                                    class="page-link {{ $packages->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                    href="{{ $packages->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li
                                            class="page-item {{ $packages->currentPage() == $packages->lastPage() ? ' disabled' : '' }}">
                                            <a class="page-link border_none_pagination"
                                                href="{{ $packages->url($packages->currentPage() + 1) }}">Next</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <!-- End paginator -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Invest area -->
    <!-- Start Banner Area -->
    <div class="banner-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-all area-80 text-center">
                        <div class="banner-content">
                            <h3>Our worldwide integration partner work with long time relationship </h3>
                            <a class="banner-btn" href="#">Open new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->


@endsection
