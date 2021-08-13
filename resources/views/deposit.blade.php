@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Deposit</p>
        </div>
        <div class="card-body">
            <form method="post" action="/pay">
                @csrf
                <input type="hidden" name="email" value="{{auth()->user()->email}}">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                <div class="mb-3"><label class="form-label" for="amount"><strong>Amount</strong></label><input class="form-control" type="number" id="amount" placeholder="1000" name="amount"></div>
    
                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button></div>
            </form>
        </div>
    </div>


    
@endsection