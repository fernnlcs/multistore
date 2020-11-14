<?php

namespace App\Models\Store\Product;

use App\Models\Store\Formal\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Increase extends Model
{
    use HasFactory;

    protected $table = "increases";

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by', 'id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    public function primaryTotalPrice(): float
    {
        return $this->primary_unit_price * $this->amount;
    }

    public function finalTotalPrice(): float
    {
        return $this->primaryTotalPrice() + $this->addition - $this->discount;
    }

    public function finalUnitPrice(): float
    {
        return $this->finalTotalPrice() / $this->amount;w
    }
}
