<div class="form-grid">

    <div class="form-group">
        <label for="item_code">Item Code</label>

        <input
            type="text"
            id="item_code"
            name="item_code"
            value="{{ old('item_code', $item->item_code ?? '') }}"
            placeholder="Example: ITM-001"
        >

        @error('item_code')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="name">Item Name</label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $item->name ?? '') }}"
            placeholder="Example: Wireless Mouse"
        >

        @error('name')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="category">Category</label>

        <input
            type="text"
            id="category"
            name="category"
            value="{{ old('category', $item->category ?? '') }}"
            placeholder="Example: Accessories"
        >

        @error('category')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="warehouse_location">Warehouse Location</label>

        <input
            type="text"
            id="warehouse_location"
            name="warehouse_location"
            value="{{ old('warehouse_location', $item->warehouse_location ?? '') }}"
            placeholder="Example: Shelf A-03"
        >

        @error('warehouse_location')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="quantity">Quantity</label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            min="0"
            value="{{ old('quantity', $item->quantity ?? 0) }}"
        >

        @error('quantity')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="unit_price">Unit Price</label>

        <input
            type="number"
            id="unit_price"
            name="unit_price"
            min="0"
            step="0.01"
            value="{{ old('unit_price', $item->unit_price ?? '') }}"
            placeholder="0.00"
        >

        @error('unit_price')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="reorder_level">Reorder Level</label>

        <input
            type="number"
            id="reorder_level"
            name="reorder_level"
            min="0"
            value="{{ old('reorder_level', $item->reorder_level ?? 0) }}"
        >

        @error('reorder_level')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

</div>