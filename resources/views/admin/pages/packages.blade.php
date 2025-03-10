@extends('admin.layout.layout')

@section('title', 'Admin | Packages')

@section('admin-content')

    @php
        $sharePrice = DB::table('share_prices')->first();
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="text-dark fw-bold">Packages</h1>
                    <div class="d-flex">
                        <div>
                            <button type="button" class="btn text-white addVideo" data-id="{{ $sharePrice->id }}"
                                data-tshare="{{ $sharePrice->total_shares }}" data-sharep="{{ $sharePrice->share_price }}"
                                style="background:#ff0000;">Share Price</button>
                            <button type="submit" class="btn text-white addPkg" style="background:#ff0000;">Add
                                Package</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5 fullInfo">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="text-white text-center" style="background:#000">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Package Shares</th>
                            <th scope="col">Shares Price</th>
                            <th scope="col">Monthly ROI</th>
                            <th scope="col">Bonus ROI</th>
                            <th scope="col">Referral Bonus</th>
                            <th scope="col">Daily Referral ROI</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($packages as $index => $pkg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pkg->pkg_shares }} Shares</td>
                                <td>$ {{ number_format($pkg->pkg_price, 2) }}</td>
                                <td>{{ $pkg->pkg_monthly_roi ?? 'N/A' }} %</td>
                                <td>{{ $pkg->pkg_bonus_roi ?? 'Surprise' }}</td>
                                <td>{{ $pkg->pkg_referral_bonus ?? 'N/A' }} %</td>
                                <td>{{ $pkg->pkg_daily_referral_roi ?? 'N/A' }} %</td>
                                <td>
                                    <i class="fa fa-pencil text-primary updatePkg" data-id="{{ $pkg->id }}"
                                        data-shares="{{ $pkg->pkg_shares }}" data-price="{{ $pkg->pkg_price }}"
                                        data-monthly="{{ $pkg->pkg_monthly_roi }}" data-bonus="{{ $pkg->pkg_bonus_roi }}"
                                        data-referral="{{ $pkg->pkg_referral_bonus }}"
                                        data-daily-roi="{{ $pkg->pkg_daily_referral_roi }}" style="cursor: pointer"></i>
                                    <span><i class="fa fa-trash text-danger mx-2 deletePkg"
                                            data-id="{{ $pkg->id }}"></i></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
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


    <!-- Share Price Modal -->
    <div class="modal fade" id="sharePrice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: linear-gradient(45deg, rgb(36, 35, 35), #8d1a1ae0); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Share Details</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.share.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="share_id" id="share_id">
                        <div class="form-group mb-3">
                            <label for="total_shares">Package Shares</label>
                            <input type="number" name="total_shares" id="total_shares" class="form-control"
                                placeholder="e.g. 1" required readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="share_price">Package Price</label>
                            <input type="number" step="0.01" name="share_price" id="share_price" class="form-control"
                                placeholder="Enter package price..." required>
                        </div>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" id="submit" class="btn btn-danger login-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Package Modal -->
    <div class="modal fade" id="addPkg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: linear-gradient(45deg, rgb(36, 35, 35), #8d1a1ae0); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Package Details</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.package.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="pkg_shares">Package Shares</label>
                            <input type="number" name="pkg_shares" id="pkg_shares" class="form-control"
                                placeholder="e.g. 1" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="pkg_monthly_roi">Monthly ROI (%)</label>
                            <input type="number" name="pkg_monthly_roi" id="pkg_monthly_roi" class="form-control"
                                placeholder="Enter monthly ROI..." />
                        </div>
                        <div class="form-group mb-3">
                            <label for="pkg_bonus_roi">Bonus ROI</label>
                            <input type="text" name="pkg_bonus_roi" id="pkg_bonus_roi" class="form-control"
                                value="Surprise" readonly />
                        </div>
                        <div class="form-group mb-3">
                            <label for="pkg_referral_bonus">Referral Bonus</label>
                            <input type="number" name="pkg_referral_bonus" id="pkg_referral_bonus" class="form-control"
                                placeholder="Enter referral bonus..." />
                        </div>
                        <div class="form-group mb-3">
                            <label for="pkg_daily_referral_roi">Daily Referral ROI (%)</label>
                            <input type="number" name="pkg_daily_referral_roi" id="pkg_daily_referral_roi"
                                class="form-control" placeholder="Enter daily referral ROI..." />
                        </div>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" id="submit" class="btn btn-danger login-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Package update Modal -->
    <div class="modal fade" id="updatePkg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: linear-gradient(45deg, rgb(36, 35, 35), #8d1a1ae0); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Package Update</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.package.update') }}">
                        @csrf
                        <input type="hidden" name="pkg_id" id="pkg_id"> <!-- Hidden field for package ID -->

                        <div class="form-group mb-3">
                            <label for="edit_pkg_shares">Package Shares</label>
                            <input type="number" name="pkg_shares" id="edit_pkg_shares" class="form-control"
                                min="1" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_pkg_monthly_roi">Monthly ROI (%)</label>
                            <input type="number" step="0.01" name="pkg_monthly_roi" id="edit_pkg_monthly_roi"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_pkg_bonus_roi">Bonus ROI (%)</label>
                            <input type="text" step="0.01" value="Surprise" name="pkg_bonus_roi"
                                id="edit_pkg_bonus_roi" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_pkg_referral_bonus">Referral Bonus (%)</label>
                            <input type="number" step="0.01" name="pkg_referral_bonus" id="edit_pkg_referral_bonus"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_pkg_daily_referral_roi">Daily Referral ROI (%)</label>
                            <input type="number" step="0.01" name="pkg_daily_referral_roi"
                                id="edit_pkg_daily_referral_roi" class="form-control">
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Share Price Modal -->
    <div class="modal fade" id="addVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"
                style="background: linear-gradient(45deg, rgb(36, 35, 35), #8d1a1ae0); color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Video Details</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.upload-video.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="video_file">Upload Video</label>
                            <input type="file" name="video_file" id="video_file" class="form-control"
                                placeholder="e.g. 1" required readonly />
                        </div>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" id="submit" class="btn btn-danger login-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".addPkg").click(function() {
                $("#addPkg").modal("show"); // Opens the modal in Bootstrap 3
            });

            $(".addVideo").click(function() {
                $("#addVideo").modal("show"); // Opens the modal in Bootstrap 3
            });

            $(".sharePrice").click(function() {
                let totalShare = $(this).data("tshare"); // Get the total share from button
                let sharePrice = $(this).data("sharep"); // Get the share price from button
                let shareId = $(this).data("id"); // Get the ID from button

                $("#total_shares").val(totalShare); // Set value in modal input
                $("#share_price").val(sharePrice); // Set value in modal input
                $("#share_id").val(shareId); // Set hidden field value if needed

                $("#sharePrice").modal("show"); // Open the modal
            });
        });

        $(document).on("click", ".updatePkg", function() {
            let pkgId = $(this).data("id") || "";
            let pkgShares = $(this).data("shares") || 0;
            let pkgMonthlyROI = $(this).data("monthly-roi") || 5;
            let pkgBonusROI = $(this).data("bonus-roi") || 'Surprise';
            let pkgReferralBonus = $(this).data("referral-bonus") || 5;
            let pkgDailyReferralROI = $(this).data("daily-roi") || 10; // Fix: Use correct key

            // Ensure fields are numeric
            $("#pkg_id").val(pkgId);
            $("#edit_pkg_shares").val(parseFloat(pkgShares) || 1);
            $("#edit_pkg_monthly_roi").val(parseFloat(pkgMonthlyROI) || 5);
            $("#edit_pkg_bonus_roi").val(parseFloat(pkgBonusROI) || 'Surprise');
            $("#edit_pkg_referral_bonus").val(parseFloat(pkgReferralBonus) || 5);
            $("#edit_pkg_daily_referral_roi").val(parseFloat(pkgDailyReferralROI) || 10);
            $("#updatePkg").modal("show"); // Ensure modal opens
        });

        $(document).on("click", ".deletePkg", function() {
            let pkgId = $(this).data("id");

            if (!pkgId) {
                toastr.error("Invalid package ID.");
                return;
            }

            if (confirm("Are you sure you want to delete this package?")) {
                $.ajax({
                    url: "{{ route('admin.package.delete') }}", // Ensure this route exists
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF protection
                        pkg_id: pkgId
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success("Package deleted successfully!");
                            setTimeout(() => {
                                location.reload();
                            }, 1500); // Wait 1.5 seconds before refreshing
                        } else {
                            toastr.error("Error deleting package.");
                        }
                    },
                    error: function() {
                        toastr.error("An error occurred. Please try again.");
                    }
                });
            }
        });
    </script>


@endsection
