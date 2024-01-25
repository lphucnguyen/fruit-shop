@extends('layouts.default')

@section('content')
<form method="POST" action="{{ route('category.create') }}">
    @csrf
    <div class="margin-y">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" type="text" placeholder="Input text" class="form-input w-100" />
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn button-primary">Add category</button>
    <a href="{{ route('category.index') }}" class="btn button-secondary">Cancel</a>
</form>

@endsection