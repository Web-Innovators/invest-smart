@extends('admin.layout.layout')

@section('title', 'Admin | Users')


@section('admin-content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="fw-bold" style="color: #003C51;">Users</h1>

                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit text-white" style="background: #ff0000;"><i
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
                    <thead class="text-white" style="background: #000;">
                        <th>#id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Referral Code</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="border">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->referral_code }}</td>
                                <td>
                                    @if ($item->status == 'approved')
                                        <span class="badge badge-success bg-success">Approved</span>
                                        <button class="badge badge-danger btn-sm banUser" data-id="{{ $item->id }}"
                                            data-status="banned">Ban</button>
                                    @elseif ($item->status == 'banned')
                                        <span class="badge badge-danger bg-danger">Banned</span>
                                        <button class="badge badge-success btn-sm unbanUser" data-id="{{ $item->id }}"
                                            data-status="approved">Unban</button>
                                    @else
                                        <span class="badge badge-warning bg-warning">Pending</span>
                                    @endif
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                    style="border-radius:10px;">
                    <div class="text-dark pt-3">
                        {{ $users->links() }}
                        <div hidden>
                            @if ($users->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $users->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $users->url($users->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $users->currentPage(); $i <= $users->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $users->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $users->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $users->url($users->currentPage() + 1) }}">Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".banUser, .unbanUser", function() {
            let userId = $(this).data("id");
            let newStatus = $(this).data("status");
            let actionText = newStatus === "banned" ? "ban" : "unban";

            if (confirm(`Are you sure you want to ${actionText} this user?`)) {
                $.ajax({
                    url: "{{ route('admin.user.ban') }}", // Ensure the route exists
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: userId,
                        status: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(`User successfully ${actionText}ned!`);
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            toastr.error("Error updating user status.");
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
