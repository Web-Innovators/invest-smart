@extends('admin.layout.layout')

@section('title', 'Admin | Home')

@section('admin-content')


    <div class="d-xl-flex justify-content-between align-items-start">
        <h1 class="fw-bold" style="color: #003C51;">Dashboard</h1>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
            <div class="dropdownTime ml-0 ml-md-4 mt-2 mt-lg-0" style="box-shadow: 0px 6px 30px rgba(1, 170, 156, 0.521);">
                <button class="btn bg-white p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1">
                    <i class="mdi mdi-calendar mr-1 mx-3 text-success" id="current-date">{{ now()->format('Y-m-d') }}</i>
                    <span id="current-time" class="text-danger fw-bolder">{{ now()->format('H:i:s') }}</span>
                </button>
            </div>

        </div>
    </div>

    <script>
        function updateTime() {
            var currentTime = new Date();
            var seconds = currentTime.getSeconds().toString().padStart(2, '0');
            document.getElementById('current-time').textContent = currentTime.getHours() + ':' + currentTime.getMinutes() +
                ':' + seconds;
        }

        setInterval(updateTime, 1000);
        document.querySelector('.dropdownTime').classList.add('animate-light');
    </script>

    @php
        $users = DB::table('users')->count();
        $userDeposits = DB::table('user_deposits')->count();
        $userWithdraws = DB::table('user_withdrawls')->count();
        $queries = DB::table('contacts')->count();
    @endphp

    <div class="row">
        <div class="col-md-12">
            <hr>

            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="{{ route('admin.users.get') }}" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Users</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i
                                                class="mdi mdi-account-multiple animate-snake icon-md absolute-center text-success"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  ">{{ $users ?? 0 }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="{{ route('admin.deposits.get') }}" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Investments</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i
                                                class="mdi mdi-currency-usd animate-snake icon-md absolute-center text-info"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold">{{ $userDeposits ?? 0 }}
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="{{ route('admin.withdraws.get') }}" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Profits</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i class="mdi mdi-bitcoin animate-snake icon-md absolute-center"
                                                style="color:rgb(17, 190, 243);"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  ">
                                            {{ $userWithdraws ?? 0 }}
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="{{ route('admin.queries.get') }}" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Queries</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5">
                                            <i
                                                class="mdi mdi-message-alert animate-snake icon-md absolute-center text-success"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold">{{ $queries ?? 0 }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
