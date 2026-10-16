@extends('layouts.app')

@section('title', 'Add Item | StockFlow')

@section('content')

<div class="page-header">

    <div>
        <h1>Add Inventory Item</h1>

        <div class="text-muted">
            Enter the details of the new inventory item.
        </div>
    </div>

</div>


<div class="card">

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please correct the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form action="{{ route('items.store') }}" method="POST">

        @csrf

        @include('items._form')

        <button type="submit" class="btn btn-primary">
            Save Item
        </button>

        <a href="{{ route('items.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection