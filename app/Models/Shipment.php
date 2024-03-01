<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'order_number',
        'customer',
        'address',
        'order_date',
        'shipment_date',
        'delivery_date',
        'item_id',
        'quantity',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
