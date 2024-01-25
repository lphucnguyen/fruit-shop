@extends('layouts.default')

@section('content')

<h1>Invoice</h1>
@livewire('invoice.add', [], key(time() . rand(0, 999)))

@endsection