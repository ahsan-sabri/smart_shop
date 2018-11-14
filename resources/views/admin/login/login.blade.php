<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Login</title>
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="{{ asset('public/admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="{{ asset('public/admin/css/sb-admin.css') }}" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}  <!--form opening-->

                    <div class="form-group">   <!--email field-->
                        <label for="exampleInputEmail1">Email address</label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" name="email" value="{{ old('email') }}" type="email" aria-describedby="emailHelp" placeholder="Enter email">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">    <!--password field-->
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" name="password" type="password" placeholder="Password">

                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember Password</label>
                        </div>
                    </div>
                    <div class="form-group">                            
                        <input class="btn btn-success btn-block" name="button" type="submit" value="Login">
                    </div>
                    {!! Form::close() !!}   <!--form close-->
                    <div class="text-center">
                        <a class="d-block small mt-3" href="{{ url('/register') }}">Register an Account</a>
                        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Boo    tstrap core JavaScript-->
        <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    </body>

</html>
