@extends('layouts.default')

@section('content')
@if(session('success'))
<div class="text-success">{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('setting.update') }}">
    @csrf
    <div class="margin-y">
        <label class="form-label">User code</label>
        <input disabled value="{{ $user['user_code'] }}" type="text" class="form-input w-100" />
        <label class="form-label">Name</label>
        <input name="name" value="{{ $user['name'] }}" type="text" placeholder="Input text" class="form-input w-100" />
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn button-primary">Update information</button>
</form>

@endsection