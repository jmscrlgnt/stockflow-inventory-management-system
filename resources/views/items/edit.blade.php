@extends('layouts.app')

@section('title', 'Edit Item | StockFlow')

@section('content')

<div class="page-header">

    <div>
        <h1>Edit Item</h1>

        <div class="text-muted">
            Update the information for {{ $item->name }}.
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


    <form action="{{ route('items.update', $item) }}" method="POST">

        @csrf
        @method('PUT')

        @include('items._form')

        <button type="submit" class="btn btn-primary">
            Update Item
        </button>

        <a href="{{ route('items.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection