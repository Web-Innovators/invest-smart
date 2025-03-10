@extends('admin.layout.layout')

@section('title', 'Admin | Queries')


@section('admin-content')



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="fw-bold" style="color: #003C51;">Queries</h1>

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
        <div class="row my-5">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class=" text-white text-center" style="background: #000;">
                        <th>#id</th>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Query</th>
                        <th>Status</th>
                    </thead>
                    <tbody class="border text-center">
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->message, 150) }}</td>
                                <td>
                                    <button type="submit" class="badge badge-success"><i class="fa fa-ban"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
