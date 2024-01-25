@extends('layouts.default')

@section('content')

<h1>Category</h1>
@if(session('success'))
<div class="text-success">{{ session('success') }}</div>
@endif
<a href="{{ route('category.add') }}" class="btn button-primary margin-y">Create category</a>
<table class="table-fill">
    <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $category['name'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $categories->links() !!}
</div>

@endsection