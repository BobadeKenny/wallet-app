@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Withdraw From Wallet</p>
        </div>
        <div class="card-body">
            <form method="post" action="/withdrawal">
            @csrf
                <div class="mb-3"><label class="form-label" for="amount"><strong>Amount</strong></label><input class="form-control" type="number" id="amount" placeholder="1000" name="amount"></div>
    
                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button></div>
            </form>
        </div>
    </div>
@endsection