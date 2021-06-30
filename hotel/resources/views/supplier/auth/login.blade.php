@extends('supplier.layout.auth')

@section('content')



<!--begin::Content-->
<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center">
					<!--begin::Signin-->
					<div class="login-form login-signin col-md-10">
						<!--begin::Form-->
						<form class="form" role="form" method="POST" action="{{ url('/supplier/login') }}">
                        {{ csrf_field() }}
							<!--begin::Title-->
                            <div class="text-primary font-size-h6 font-weight-bolder text-hover-primary pb-5">
                                Login/Register as
                                <a class="border-2 border-bottom border-bottom-danger font-size-h3"
                                   href="{{ url('user/login')}}">Customer</a>
                                or
                                <a class="border-2 border-bottom border-bottom-danger font-size-h3"
                                   href="{{ url('supplier/login')}}">Supplier</a>
                            </div>
							<div class="pb-13 pt-lg-0 pt-5">
								<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome Supplier</h3> <span class="text-muted font-weight-bold font-size-h4">New Here?
                                    <a href="{{ url('/supplier/register') }}" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span> </div>
							<!--begin::Title-->
							<!--begin::Form group-->
							<div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>

                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="email" name="email" autocomplete="off" value="{{ old('email') }}" />

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             </div>
							<!--end::Form group-->
							<!--begin::Form group-->
							<div class="form-group">
								<div class="d-flex justify-content-between mt-n5">
									<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label> <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                        Forgot Password ?
                                    </a>
                                </div>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" />

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
							<!--end::Form group-->
							<!--begin::Action-->
							<div class="pb-lg-0 pb-5">
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Log In</button>

							</div>
                            <br>

							<!--end::Action-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Signin-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer-->
				<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0"> <a href="#" class="text-primary font-weight-bolder font-size-h5">Terms</a> <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Plans</a> <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Contact Us</a> </div>
				<!--end::Content footer-->
			</div>
			<!--end::Content-->
@endsection
