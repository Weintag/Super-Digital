<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'count',
    ];

    public function product(): HasOne
    {
        return $this->HasOne(Catalog::class, 'id', 'product_id');
    }
}
