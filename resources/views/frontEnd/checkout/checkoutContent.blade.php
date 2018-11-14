@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('mainContent')



<div class="login-grids container">
    <h3 class="text-center" style="padding: 60px 150px 40px 150px; color: #FDA30E;">You have to signin to complete your checkout. If you are not registered then sign up first.</h3>

    <div class="login">
        <div class="login-bottom">
            <h3>Sign up</h3>

            {!! Form::open(['url' => '/checkout/signup', 'method' => 'POST']) !!}
            <div class="sign-up">
                <h4><label for="name">Name :</label></h4>
                <input type="text" name="name" placeholder="Type your name" id="name" required="">	
            </div>

            <div class="sign-up">
                <h4><label for="email">Email :</label></h4>
                <input type="text" name="email" placeholder="Type your email" id="email" required="">	
            </div>

            <div class="sign-up">
                <h4><label for="address">Address :</label></h4>
                <input type="text" name="address" placeholder="Type your address" id="address" required="">	
            </div>

            <div class="sign-up">
                <h4><label for="mobile">Mobile no :</label></h4>
                <input type="text" name="mobile" placeholder="Type your Mobile no" id="mobile" required="">	
            </div>

            <div class="sign-up">
                <h4><label for="password">Password :</label></h4>
                <input type="password" name="password" placeholder="Type your password" id="password" required="">

            </div>

            <div class="sign-up">
                <h4><label for="re-password">Retype password :</label></h4>
                <input type="password" name="confirmPassword" placeholder="Confirm password" id="re-password" required="">

            </div>
            <h3 style="color: red">{{ Session::get('message') }}</h3><br>
            <div class="sign-up">
                <input type="submit" name="regiSubmit" value="REGISTER NOW" >
            </div>

            {!! Form::close() !!}

        </div>
        <div class="login-right">
            <h3>Sign in with your account</h3>

            {!! Form::open(['url' => '/checkout/signup', 'method' => 'POST']) !!}
            <div class="sign-up">
                <h4><label for="login-email">Email :</label></h4>
                <input type="text" name="email" placeholder="Type your email" id="login-email" required="">	
            </div>

            <div class="sign-up">
                <h4><label for="login-password">Password :</label></h4>
                <input type="password" name="password" placeholder="Type your password" id="login-password" required="">

            </div>

            <div class="single-bottom">
                <input type="checkbox"  id="brand" value="">
                <label for="brand"><span></span>Remember Me.</label>
            </div>
            <div class="sign-in">
                <input type="submit" value="SIGNIN" >
            </div>
            {!! Form::close() !!}

        </div>
        <div class="clearfix"></div>
    </div>
</div><br><br><br>

@endsection 