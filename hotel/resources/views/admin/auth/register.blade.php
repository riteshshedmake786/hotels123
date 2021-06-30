@extends('admin.layout.auth') 

@section('content')
<div class="login-form login-signup m-auto">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
        {{ csrf_field() }}
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="User Name" name="name" id="name" value="{{ old('name') }}"  autocomplete="off"/>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="E-Mail Address" name="email" id="email" value="{{ old('email') }}"  autocomplete="off"/>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  placeholder="Password" name="password" id="password" value="{{ old('password') }}"  autocomplete="off"/>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="off"/>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
            <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Register</button>
            <a href="{{ url('/admin/login') }}" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
        </div>
    </form>
</div>
@endsection
