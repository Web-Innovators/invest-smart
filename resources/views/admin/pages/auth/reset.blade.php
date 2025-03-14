<!doctype html>
<html lang="en">

<head>
    <title>Admin | Reset Password</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('user-assets') }}/img/logo/fc-logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('admin-assets/admin-auth-assets') }}/cstm.css">
    <style>
        body {
                width: 100%;
                height: 100vh;
                font-family: "Lato", Arial, sans-serif;
                font-size: 16px;
                line-height: 1.8;
                font-weight: normal;
                background: linear-gradient(45deg, #181818, #fffffe);
                color: gray;
            }
            .ftco-section {
                padding: 20px 0;
            }
        </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;

            @if (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif

            @if (Session::has('info'))
                toastr.info('{{ Session::get('info') }}');
            @endif

            @if (Session::has('warning'))
                toastr.warning('{{ Session::get('warning') }}');
            @endif

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
        });
    </script>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mx-auto text-center">
                    <div style="width: 100%;">
                        <img src="{{ url('user-assets') }}/img/logo/logo.png" alt=""
                            style="width: 100%;">
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Congratulations !</h3>
                        <form action="{{route('admin.reset.post')}}" method="post" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="token" value="{{ $token }}"
                                    class="form-control rounded-left">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-left"
                                    placeholder="Email..." required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="cpassword" class="form-control rounded-left"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn rounded submit p-3 px-5" style="background: #ff0000; color:white">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <script src="{{ url('admin-assets/admin-auth-assets') }}/jquery.min.js"></script>
    <script src="{{ url('admin-assets/admin-auth-assets') }}/popper.js"></script>
    <script src="{{ url('admin-assets/admin-auth-assets') }}/bootstrap.min.js"></script>
    <script src="{{ url('admin-assets/admin-auth-assets') }}/main.js"></script>
</body>

</html>
