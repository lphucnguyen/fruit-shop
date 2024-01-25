@extends('layouts.default')

@section('content')

<h1>Fruit</h1>
@if(session('success'))
<div class="text-success">{{ session('success') }}</div>
@endif
<a href="{{ route('fruit.add') }}" class="btn button-primary margin-y">Create fruit</a>
<table class="table-fill">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fruits as $key => $fruit)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $fruit['name'] }}</td>
            <td>{{ $fruit['unit'] }}</td>
            <td>{{ number_format($fruit['price'], 0, "", ",") }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $fruits->links() !!}
</div>

@endsection