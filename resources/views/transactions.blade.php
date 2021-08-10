@extends('layouts.app')

@section('content')
<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
    <table class="table my-0" id="dataTable">
        <thead>
            <tr>
                <th>Mode of Transaction</th>
                <th>Amount</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user['transactions'] as $transaction)
            <tr>
                <td>{{$transaction['type']}}</td>
                <td>{{$transaction['amount']}}</td>
                <td>{{$transaction['confirmed']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
            
@endsection