@extends('layouts.default')

@section('content')

<h1>Invoice</h1>
@livewire('invoice.edit', [
    'orderFruits' => $invoice['fruits'],
    'customerName' => $invoice['customer_name'],
    'user' => $invoice['user'],
    'idOrder' => $invoice['id'],
], key(time() . rand(0, 999)))

@endsection