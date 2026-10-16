@extends('layouts.app')

@section('title', 'Item Details | StockFlow')

@section('content')

<div class="page-header">

    <div>
        <h1>Item Details</h1>

        <div class="text-muted">
            Complete inventory information.
        </div>
    </div>

    <div>

        <a
            href="{{ route('items.edit', $item) }}"
            class="btn btn-warning"
        >
            Edit Item
        </a>

        <a
            href="{{ route('items.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>


<div class="card">

    <div class="details-grid">

        <div>
            <div class="detail-label">Item Code</div>
            <div class="detail-value">{{ $item->item_code }}</div>
        </div>

        <div>
            <div class="detail-label">Item Name</div>
            <div class="detail-value">{{ $item->name }}</div>
        </div>

        <div>
            <div class="detail-label">Category</div>
            <div class="detail-value">{{ $item->category }}</div>
        </div>

        <div>
            <div class="detail-label">Warehouse Location</div>
            <div class="detail-value">
                {{ $item->warehouse_location }}
            </div>
        </div>

        <div>
            <div class="detail-label">Quantity</div>
            <div class="detail-value">{{ $item->quantity }}</div>
        </div>

        <div>
            <div class="detail-label">Unit Price</div>
            <div class="detail-value">
                ₱{{ number_format($item->unit_price, 2) }}
            </div>
        </div>

        <div>
            <div class="detail-label">Reorder Level</div>
            <div class="detail-value">
                {{ $item->reorder_level }}
            </div>
        </div>

        <div>
            <div class="detail-label">Stock Status</div>

            <div class="detail-value">

                @if($item->stock_status === 'In Stock')

                    <span class="badge badge-success">
                        In Stock
                    </span>

                @elseif($item->stock_status === 'Low Stock')

                    <span class="badge badge-warning">
                        Low Stock
                    </span>

                @else

                    <span class="badge badge-danger">
                        Out of Stock
                    </span>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection