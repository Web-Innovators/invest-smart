@extends('admin.layout.layout')

@section('title', 'Admin | Deposits')

@section('admin-content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="text-dark fw-bold">Deposits</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit" class="text-white" style="background:#ff0000;"><i
                                        class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5 fullInfo">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="text-white" style="background:#000">
                        <tr>
                            <th>#</th>
                            <th>User Info</th>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Details</th>
                            <th>Payment SS</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userDeposits as $item)
                            @php
                                $userInfo = DB::table('users')->where('id', $item->user_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $userInfo->name }}</li>
                                        <li>{{ $userInfo->email }}</li>
                                    </ul>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>{{ strtoupper($item->transaction_id) }}</td>
                                <td class="green">
                                    ${{ number_format($item->pkg_amount, 2) }}</td>
                                <td>{{ $item->pkg_shares }} Shares</td>
                                <td>
                                    <a href="{{ asset('uploads/payments/' . $item->payment_ss) }}" data-fancybox="gallery"
                                        data-caption="Payment Screenshot">
                                        <span style="cursor: pointer;" class="badge badge-success bg-success">
                                            <i class="fa fa-eye"></i> View
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <span class="badge badge-warning bg-warning update-status"
                                            data-id="{{ $item->id }}" data-status="approved" style="cursor: pointer;">
                                            Pending (Click to Approve)
                                        </span>
                                    @elseif($item->status == 'approved')
                                        <span class="badge badge-success bg-success update-status"
                                            data-id="{{ $item->id }}" data-status="declined" style="cursor: pointer;">
                                            Approved (Click to Decline)
                                        </span>
                                    @elseif($item->status == 'declined')
                                        <span class="badge badge-danger bg-danger update-status"
                                            data-id="{{ $item->id }}" data-status="approved" style="cursor: pointer;">
                                            Declined (Click to Re-Approve)
                                        </span>
                                    @endif
                                </td>
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
                        {{ $userDeposits->links() }}
                        <!-- paginator -->
                        <div hidden>
                            @if ($userDeposits->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $userDeposits->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $userDeposits->url($userDeposits->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $userDeposits->currentPage(); $i <= $userDeposits->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a style="background-color:#003d70; border-color: #003d70;"
                                                class="page-link {{ $userDeposits->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $userDeposits->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $userDeposits->currentPage() == $userDeposits->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $userDeposits->url($userDeposits->currentPage() + 1) }}">Next</a>
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



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.update-status', function() {
            let depositId = $(this).data('id');
            let newStatus = $(this).data('status'); // Get the new status to update

            $.ajax({
                url: "{{ route('update.deposit.status') }}", // Update this route in web.php
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    deposit_id: depositId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Deposit status updated successfully!');
                        setTimeout(() => {
                            location.reload(); // Reload to reflect changes
                        }, 1500); // Delay reload for effect
                    } else {
                        toastr.error('Failed to update status.');
                    }
                },
                error: function() {
                    toastr.error('Error updating status.');
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {

            $('.infoPre').show();
        });
    </script>

@endsection
