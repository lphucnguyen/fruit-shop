@extends('layouts.default')

@section('content')

<h1>Invoice</h1>
@if(session('success'))
<div class="text-success">{{ session('success') }}</div>
@endif
<a href="{{ route('invoice.add') }}" class="btn button-primary margin-y">Create invoice</a>
<table class="table-fill">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $key => $invoice)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $invoice['customer_name'] }}</td>
            <td>
                <a href="{{ route('invoice.edit', $invoice['id']) }}" class="btn button-secondary">
                    <i class="fa fa-edit"></i>
                </a>
                <form style="display: inline-block;" action="{{ route('invoice.delete', ['id' => $invoice['id'] ]) }}" method="post">
                    <button type="submit" class="btn button-secondary">
                        <i class="fa fa-trash"></i>
                    </button>
                    <input type="hidden" name="_method" value="delete" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {!! $invoices->links() !!}
</div>

@endsection