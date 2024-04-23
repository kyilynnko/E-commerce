@extends("layout.master")
@section("Title","User Register")

@section("content")

<div class="container my-5">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-5 text-center text-info english">User Register</h1>
        @if (\App\Classes\Session::has("error_message"))
            {{\App\Classes\Session::flash("error_message")}}
        @endif
        <form action="/user/register" method="post" >

            <input type="hidden" name="token" id="token" value="{{\App\Classes\CSRFToken::_token()}}">


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control rounder-0" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control rounder-0" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounder-0" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control rounder-0" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="row justify-content-between no-gutters">
                <a href="/user/login">Already register. Please login here!</a>
                <span>
                    <button class="btn btn-outline-warning btn-sm">Cancel</button>
                    <button class="btn btn-primary btn-sm">Register</button>
                </span>
            </div>
        </form>
    </div>
</div>

@endsection