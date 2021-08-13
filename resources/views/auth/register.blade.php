@extends('layouts.index')

@section('content')
<div class="card shadow-lg o-hidden border-0 my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-flex">
                <div class="flex-grow-1 bg-register-image" style="background-image: url('assets/img/undraw_transfer_money_rywa.svg');"></div>
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Create an Account!</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="user">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control form-control-user @error('name') is-invalid @enderror" type="text" id="name" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control form-control-user" type="password" id="password-confirm" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            
                        </div>
                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                        <hr>
                    </form>
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


                          
                                
                            
