<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_code',
        'name',
        'category',
        'warehouse_location',
        'quantity',
        'unit_price',
        'reorder_level',
    ];

    public function getStockStatusAttribute(): string
    {
        if ($this->quantity == 0) {
            return 'Out of Stock';
        }

        if ($this->quantity <= $this->reorder_level) {
            return 'Low Stock';
        }

        return 'In Stock';
    }
}