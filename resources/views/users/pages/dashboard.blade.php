@extends('users.layouts.layout')

@section('title', 'Dashboard | Invest Smart')

@section('main-content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center" style="position: relative;">
                        <div class="section-headline white-headline">
                            <h3>Dashboard</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Dashboard</li>
                            <a href="{{ route('logout.get') }}" style="position: absolute; top: 18px; right: 20px;"><button
                                    class="btn btn-danger">Logout</button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
    <style>
        .transactions {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        .transactions table {
            width: 100%;
            border-collapse: collapse;
            background-color: #b08d42;
            color: #003C51;
        }

        .transactions th,
        .transactions td {
            padding: 10px;
            border-bottom: 1px solid #003C51;
            text-align: center;
        }

        .transactions th {
            background-color: #aa7f35;
        }

        .transactions .wallet-badge {
            background: #222;
            padding: 5px 10px;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
        }

        .green {
            color: #0f0;
        }

        .tabsCont {
            background-color: #f7f6f5;
            padding: 10px;
            border-radius: 10px;
            /* height: 450px; */
        }

        /* Tab Navigation */
        .nav-tabs-container {
            margin: 0;
            padding: 0;
            border: 0;
        }

        .nav-tabs>li>a {
            background: #e9e9e9;
            color: black;
            border-radius: 0;
            box-shadow: inset 0 -8px 7px -9px rgba(0, 0, 0, .4), -2px -2px 5px -2px rgba(0, 0, 0, .4);
            padding: 12px;
            margin-bottom: 10px;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:hover {
            background: #ff0000 !important;
            color: white !important;
            box-shadow: inset 0 0 0 0 rgba(0, 0, 0, .4), -2px -3px 5px -2px rgba(0, 0, 0, .4);
            cursor: pointer;
        }

        /* Tab Content */
        .tab-content {
            padding: 0;
        }

        .tab-pane {
            background: #e9e9e9;
            box-shadow: 0 0 4px rgba(0, 0, 0, .4);
            border-radius: 0;
            text-align: center;
            padding: 10px;
            height: 500px;
        }

        .tab-pane h4 {
            text-align: left !important;
            font-weight: bolder;
        }
    </style>
    <!-- Start contact Area -->
    <div class="contact-area page-padding">
        <div class="container">
            <div class="row">
                <div class="contact-inner d-flex align-items-center justify-content-center"
                    style="display: flex; align-items:center; justify-content:center;">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon dbCrd text-center">
                            @php
                                $totalShares = DB::table('user_assets')
                                    ->where('user_id', Auth::id())
                                    ->where('deposits_shares', '!=', '')
                                    ->sum('deposits_shares'); // Get only deposits_shares column value
                                $approvedWithdraws = DB::table('user_withdrawls')
                                    ->where('user_id', Auth::id())
                                    ->where('status', 'approved')
                                    ->sum('share_withdrawl_requested'); // Total requested shares
                                $sharePrice = DB::table('share_prices')->first();
                                $tShares = $totalShares - $approvedWithdraws;
                            @endphp
                            <div class="single-icon">
                                <i class="fa fa-dollar"></i>
                                <p>
                                <h3>Deposits</h3>
                                <br>
                                <h5>{{  $tShares ?? 0 }} Shares</h5> {{-- Default to 0 if null --}}
                                <br>
                                <h6>$ {{ $tShares * $sharePrice->share_price ?? 0 }}</h6> {{-- Default to 0 if null --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon dbCrd text-center">
                            <div class="single-icon">
                                @php
                                    $totals_withdraws = DB::table('user_withdrawls')
                                        ->where('user_id', Auth::id())
                                        ->sum('share_withdrawl_requested'); // Total requested shares
                                    $pending_withdraws = DB::table('user_withdrawls')
                                        ->where('user_id', Auth::id())
                                        ->where('status', 'pending')
                                        ->sum('share_withdrawl_requested'); // Pending withdrawal shares
                                    $sharePrice = DB::table('share_prices')->first();
                                @endphp
                                <i class="fa fa-bitcoin"></i>
                                <p>
                                <h3>Withdrawals</h3>
                                <br>
                                <h5>
                                    <span style="color: {{ $pending_withdraws > 0 ? 'red' : 'green' }};">
                                        {{ $totals_withdraws }} Shares
                                    </span>
                                </h5>
                                <br>
                                <h6>$ {{ $totals_withdraws * $sharePrice->share_price ?? 0 }}</h6> {{-- Ensure share price exists --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tabsCont">
                <div class="nav-tabs-container col-sm-3 col-md-3">
                    <ul class="nav nav-tabs nav-stacked" role="tablist">
                        <li class="active">
                            <a href="#profile" role="tab" data-toggle="tab">
                                <i class="fa fa-user" style="    margin-right: 15px;"></i> Wallet
                            </a>
                        </li>
                        <li>
                            <a href="#deposits" role="tab" data-toggle="tab">
                                <i class="fa fa-dollar" style="    margin-right: 15px;"></i> Deposits
                            </a>
                        </li>
                        <li><a href="#withdrawls" role="tab" data-toggle="tab">
                                <i class="fa fa-bitcoin" style="    margin-right: 15px;"></i> Withdrawls
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content col-sm-9 col-md-9">
                    <div class="tab-pane active in" id="profile">
                        <h4>Wallet</h4>
                        <hr style="margin: 0;">
                        <div class="modal-content"
                            style="border: none; background: linear-gradient(45deg, black, #d19f9fe0); color: white;">
                            <div class="modal-body">
                                @php
                                    $walletAddress = DB::table('profile_details')
                                        ->where('user_id', Auth::id())
                                        ->first();
                                @endphp
                                <form method="POST" action="{{ route('profile-info.post') }}" class="signupForm">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="wallet_address">TRC20 Address</label>
                                        <input type="text" name="wallet_address" id="wallet_address"
                                            value="{{ $walletAddress?->TRC20_address ?? '' }}" class="form-control"
                                            placeholder="Wallet Address..." required
                                            data-error="Please enter your wallet_address">
                                    </div>
                                    <hr>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="submit" class="login-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="deposits">
                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h4>Deposits</h4>
                            {{-- <a class="s-menu withDrawShare" href="javascript:void(0);">Withdraw</a> --}}
                            @php
                                $deposits = DB::table('user_deposits')->where('user_id', Auth::id())->get();
                                // dump($deposits);
                            @endphp
                        </div>
                        <hr>
                        <div class="transactions mt-4">
                            @if ($deposits->isEmpty())
                                <div class="alert alert-warning text-center" role="alert"
                                    style="background: rgb(76, 213, 255); color:white;">
                                    <strong>No deposit records found.</strong>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead class="text-black">
                                        <tr>
                                            <th>Date</th>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Details</th>
                                            <th>Payment SS</th>
                                            <th>Withdraw</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposits as $item)
                                            @php
                                                $withdraws = DB::table('user_withdrawls')
                                                    ->where('user_id', Auth::id())
                                                    ->where('deposit_id', $item->id)
                                                    ->first();
                                            @endphp
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                                <td>{{ strtoupper($item->transaction_id) }}</td>
                                                <td class="green" style="color: white;">
                                                    ${{ number_format($item->pkg_amount, 2) }}</td>
                                                <td>{{ $item->pkg_shares }} Shares</td>
                                                <td>
                                                    <a href="{{ asset('uploads/payments/' . $item->payment_ss) }}"
                                                        data-fancybox="gallery" data-caption="Payment Screenshot">
                                                        <span style="cursor: pointer;"
                                                            class="badge badge-success bg-success">
                                                            <i class="fa fa-eye"></i> View
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($withdraws && $withdraws->status == 'pending')
                                                        <a href="{{ route('share.withdraw.request', $item->id) }}">
                                                            <span class="badge badge-info bg-info"
                                                                style="background: #ff0000;">Withdraw</span>
                                                        </a>
                                                    @elseif(!$withdraws)
                                                        <a href="{{ route('share.withdraw.request', $item->id) }}">
                                                            <span class="badge badge-info bg-info"
                                                                style="background: #ff0000;">Withdraw</span>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);">
                                                            <span class="badge badge-info bg-info"
                                                                style="background: #34c458;">Withdraw Done</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 'pending')
                                                        <span class="badge badge-warning bg-warning">Pending</span>
                                                    @elseif($item->status == 'approved')
                                                        <span class="badge badge-success bg-success"
                                                            style="background: green;">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger bg-danger">Declined</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="withdrawls">
                        <div style="display: flex; align-items:center; justify-content:space-between;">
                            <h4>Withdrawls</h4>
                            @php
                                $withdrawls = DB::table('user_withdrawls')->where('user_id', Auth::id())->get();
                                // dump($deposits);
                            @endphp
                        </div>
                        <hr>
                        <div class="transactions mt-4">
                            @if ($withdrawls->isEmpty())
                                <div class="alert alert-warning text-center" role="alert"
                                    style="background: rgb(76, 213, 255); color:white;">
                                    <strong>No withdrawls records found.</strong>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead class="text-black">
                                        <tr>
                                            <th>Date</th>
                                            <th>Requested Shares</th>
                                            {{-- <th>User Shares</th> --}}
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdrawls as $item)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                                <td>{{ $item->share_withdrawl_requested }} Shares</td>
                                                {{-- <td>
                                                    <a href="">
                                                        <span class="badge badge-info bg-info"
                                                            style="background: #ff0000;">sell</span>
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    @if ($item->status == 'pending')
                                                        <span class="badge badge-warning bg-warning" style="background: goldenrod;">Pending</span>
                                                    @elseif($item->status == 'approved')
                                                        <span class="badge badge-success bg-success" style="background: green;">Approved</span>
                                                    @else
                                                        <span class="badge badge-danger bg-danger" style="background: red;">Declined</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact Area -->


    <script>
        Fancybox.bind("[data-fancybox]", {
            Thumbs: {
                autoStart: true,
            }
        });
    </script>


@endsection
