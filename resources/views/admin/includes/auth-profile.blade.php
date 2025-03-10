@extends('admin.layout.layout')

@section('title', 'Admin | Profile')


@section('admin-content')

    <style>
        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #0c2a42;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #16181a;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="text-danger fw-bolder">Profile</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="sec-form p-4" style="border-radius:20px; background:#0c2a42;">
                    <form action="{{ route('admin.profile.post') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"
                                placeholder="Enter user name...">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control"
                                placeholder="Enter user email...">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="old_password" value="" class="form-control"
                                placeholder="Enter old password...">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="npassword" value="" class="form-control"
                                placeholder="Enter new password...">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


   



@endsection
