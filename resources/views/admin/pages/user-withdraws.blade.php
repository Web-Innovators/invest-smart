@extends('admin.layout.layout')

@section('title', 'Admin | Withdraws')

@section('admin-content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="text-dark fw-bold">Withdrawls</h1>
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
                    <thead class="text-white " style="background:#000">
                        <tr>
                            <th>#</th>
                            <th>User Info</th>
                            <th>Date</th>
                            <th>Requested Shares</th>
                            {{-- <th>User Shares</th> --}}
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userWithdraws as $item)
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
                                <td>{{ $item->share_withdrawl_requested }} Shares</td>
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
                        {{ $userWithdraws->links() }}
                        <!-- paginator -->
                        <div hidden>
                            @if ($userWithdraws->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $userWithdraws->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $userWithdraws->url($userWithdraws->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $userWithdraws->currentPage(); $i <= $userWithdraws->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a style="background-color:#003d70; border-color: #003d70;"
                                                class="page-link {{ $userWithdraws->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $userWithdraws->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $userWithdraws->currentPage() == $userWithdraws->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $userWithdraws->url($userWithdraws->currentPage() + 1) }}">Next</a>
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
            let withdrawId = $(this).data('id');
            let newStatus = $(this).data('status'); // Get the new status to update

            $.ajax({
                url: "{{ route('update.withdraw.status') }}", // Update this route in web.php
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    withdraw_id: withdrawId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Withdrawl status updated successfully!');
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
