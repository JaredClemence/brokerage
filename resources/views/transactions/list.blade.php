@extends('designs.layout')
@section('main')
<div class='container'>
    <div class='row'>
        <div class='col'>
            <h1>Transaction List</h1>
            @include('transactions.list.group')
        </div>
    </div>
</div>
@endsection
