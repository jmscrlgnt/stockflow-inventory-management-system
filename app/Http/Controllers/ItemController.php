<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display all inventory items.
     */
   public function index(Request $request)
{
    $search = $request->input('search');

    $items = Item::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('item_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('warehouse_location', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();

    $totalItems = Item::count();

    $totalUnits = Item::sum('quantity');

    $lowStock = Item::where('quantity', '>', 0)
        ->whereColumn('quantity', '<=', 'reorder_level')
        ->count();

    $outOfStock = Item::where('quantity', 0)->count();

    return view('items.index', compact(
        'items',
        'search',
        'totalItems',
        'totalUnits',
        'lowStock',
        'outOfStock'
    ));
}

    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created item.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => 'required|string|max:50|unique:items,item_code',
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'warehouse_location' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item added successfully.');
    }

    /**
     * Display one inventory item.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing an item.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update an existing item.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'item_code' => 'required|string|max:50|unique:items,item_code,' . $item->id,
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'warehouse_location' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'reorder_level' => 'required|integer|min:0',
        ]);

        $item->update($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Delete an inventory item.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}