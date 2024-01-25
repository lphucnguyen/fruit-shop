@extends('layouts.default')

@section('content')

<h1>Fruit</h1>
<form method="POST" action="{{ route('fruit.create') }}">
    @csrf
    <div class="margin-y">
        <label class="form-label">Category</label>
        <select name="category_id" id="category" class="form-input w-100">
            {{ old('category_id') }}
            @foreach($categories as $category)
            <option {{ old('category_id') == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label class="form-label margin-y">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Input text" class="form-input w-100" />
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <label class="form-label margin-y">Unit</label>
        <select name="unit" value="{{ old('unit') }}" placeholder="Input text" class="form-input w-100">
            <option disabled>Select unit</option>
            <option {{ old('unit') === 'kg' ? "selected" : "" }} value="kg">kg</option>
            <option {{ old('unit') === 'pack' ? "selected" : "" }} value="pack">pack</option>
            <option {{ old('unit') === 'pcs' ? "selected" : "" }} value="pcs">pcs</option>
        </select>
        @error('unit')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <label class="form-label margin-y">Price</label>
        <input name="price" value="{{ old('price') }}" type="currency" placeholder="Input text" class="form-input w-100" />
        @error('price')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn button-primary">Add fruit</button>
    <a href="{{ route('fruit.index') }}" class="btn button-secondary">Cancel</a>
</form>

@endsection

@push('script')
<script>
    const dropdowns = document.querySelectorAll("select.dropdown");
    const form = document.querySelector("form");

    if (dropdowns.length > 0) {
        dropdowns.forEach((dropdown) => {
            createCustomDropdown(dropdown);
        });
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let priceElement = document.querySelector("input[type='currency']");
        let price = priceElement.value.replace(/\D/g, "");
        priceElement.value = price;

        form.submit();
    });
</script>
@endpush