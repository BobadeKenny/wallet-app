@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">User Settings</p>
            </div>
            <div class="card-body">
                <form method="post" action="/updateuser">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" placeholder="{{$user['username']}}" onkeyup="search_username(this.value)" name="username">
                                <p id="results" class="bg-warning"></p>
                            </div>
 
                           
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" onkeyup="search_email(this.value)" placeholder="{{$user['email']}}" name="email">
                                <p id="results_email" class="bg-warning"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="firstname" placeholder="{{$user['firstname']}}" name="firstname"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="lastname" placeholder="{{$user['lastname']}}" name="lastname"></div>
                        </div>
                    </div>
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection