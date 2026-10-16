@extends('layouts.app')

@section('title', 'Inventory | StockFlow')

@section('content')

<div class="page-header">

    <div>
        <h1>Inventory</h1>
        <div class="text-muted">
            Manage and monitor StockFlow inventory records.
        </div>
    </div>

    <a href="{{ route('items.create') }}" class="btn btn-primary">
        + Add Item
    </a>

</div>

<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-label">Total Items</div>
        <div class="stat-number">{{ $totalItems }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-label">Total Units</div>
        <div class="stat-number">{{ $totalUnits }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-label">Low Stock</div>
        <div class="stat-number">{{ $lowStock }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-label">Out of Stock</div>
        <div class="stat-number">{{ $outOfStock }}</div>
    </div>

</div>

<div class="card" style="margin-bottom: 24px;">

    <form
        action="{{ route('items.index') }}"
        method="GET"
        class="search-bar"
    >

        <input
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Search by item code, name, category, or location..."
        >

        <button type="submit" class="btn btn-primary">
            Search
        </button>

        @if($search)

            <a
                href="{{ route('items.index') }}"
                class="btn btn-secondary"
            >
                Clear
            </a>

        @endif

    </form>

    @if($search)

        <div class="search-result">

            Showing {{ $items->count() }}
            result(s) for
            "<strong>{{ $search }}</strong>"

        </div>

    @endif

</div>

<div class="card">

    @if($items->isEmpty())

    <div class="empty-state">

        @if($search)

            <h2>No matching inventory found</h2>

            <p class="text-muted">
                No item matches "{{ $search }}".
            </p>

            <a
                href="{{ route('items.index') }}"
                class="btn btn-secondary"
            >
                Clear Search
            </a>

        @else

            <h2>No inventory records yet</h2>

            <p class="text-muted">
                Start by adding your first inventory item.
            </p>

            <a
                href="{{ route('items.create') }}"
                class="btn btn-primary"
            >
                Add First Item
            </a>

        @endif

    </div>

    @else

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($items as $item)

                        <tr>

                            <td>{{ $item->item_code }}</td>

                            <td>
                                <strong>{{ $item->name }}</strong>
                            </td>

                            <td>{{ $item->category }}</td>

                            <td>{{ $item->warehouse_location }}</td>

                            <td>{{ $item->quantity }}</td>

                            <td>
                                ₱{{ number_format($item->unit_price, 2) }}
                            </td>

                            <td>

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

                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('items.show', $item) }}"
                                        class="btn btn-info"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('items.edit', $item) }}"
                                        class="btn btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('items.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</div>

@endsection