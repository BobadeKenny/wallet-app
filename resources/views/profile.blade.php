@extends('layouts.app')

@section('content')

        
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    {{ __('You are logged in!') }}
    <p>
    {{ __('Your Balance is #'.App\Models\User::find(Auth::user()->id)->balance) }}
    </p>
    @if (Auth::user()->balance > 0)
    <button onclick="toggle('withdraw')">Withdraw</button>
    <button onclick="toggle('transfer')">Transfer</button>
        @endif
        <button onclick="toggle('deposit')">Deposit</button>
                            
</div>
                        <div class="main">
                            <div class="card-body" id="deposit" style="display: none;">
                                <form action="/deposit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{Auth::user()->id}}>
                                    <input type="number" name="amt">
                                    <input type="submit" name="submit">
                                    
            
                                </form>
                            </div>
                            <div class="card-body" id="withdraw" style="display: none;">
                                <form action="/withdraw" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{Auth::user()->id}}>
                                    <input type="number" name="amt">
                                    <input type="submit" name="submit">
            
                                </form>
                            </div>
                            <div class="card-body" id="transfer" style="display: none;">
                                <form action="/transfer" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{Auth::user()->id}}>
                                    <input type="hidden" name="name" value={{Auth::user()->name}}>
                                    <input type="text" name="rid" placeholder="Reciever Username">
                                    <input type="number" name="amt" placeholder="Amount">
                                    <input type="submit" name="submit">
            
                                </form>
                            </div>
                            <div class="card-body">
                                <h2>Transactions</h2>
                               
                            </div>
                        </div>
                    
@endsection
