@extends('layouts.index')
    @section('content')
    <header class="header-blue">
        <div class="container hero">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <h1 style="font-family: Lato, sans-serif;font-size: 60px;margin-top: 130px;"><i class="fas fa-wallet">MyWallet</i></h1>
                    <h1 style="font-family: Lato, sans-serif;font-size: 60px;">The revolution is here.</h1>
                    <p style="font-size: 30px;font-family: Alegreya, serif;">Transfer money to anyone, anywhere in the world.</p>
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary btn-lg action-button" type="button" style="font-family: Alegreya, serif;">Home</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg action-button" type="button" style="font-family: Alegreya, serif;">Log In</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg action-button" type="button" style="font-family: Alegreya, serif;">Register</a>
                            @endif
                        @endauth
                    @endif
                    
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder"><img src="assets/img/undraw_pay_online_b1hk.svg" style="max-width: 100%;margin-top: 130px;margin-right: 20px;"></div>
            </div>
        </div>
    </header>
    
    @endsection
