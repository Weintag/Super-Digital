<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'product_id', 'id');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
