@extends('layouts.regLayout')

@section('content')

<div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Profile!</h1>
              </div>
              @foreach($views as $view)
              <form method="POST" action="{{ url('update/profile/'.$view->id) }}" aria-label="{{ __('Register') }}" class="user">
                        @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="exampleFirstName" class="form-control form-control-user {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $view->first_name }}" placeholder="Family Name" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="exampleLastName" class="form-control form-control-user {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $view->last_name }}" placeholder="Last Name" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="exampletelephone" class="form-control form-control-user {{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ $view->telephone }}" placeholder="Telephone" required autofocus>
                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="exampleRole" class="form-control form-control-user {{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{ $view->role }}" placeholder="Role  Eg: Admin, Agent, House Owner" readonly>            
                        @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $view->email }}" id="exampleInputEmail" placeholder="Email Address" required>
@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="exampleInputPassword" placeholder="Old Password" required>
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user {{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" id="exampleInputPassword" placeholder="New Password" required>
                    @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              @endforeach
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
              </div>
            </div>
@endsection
