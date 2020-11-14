<?php

namespace App\Models\Store\Product;

use App\Models\Store\Formal\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";    

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'product', 'category', 'id', 'id');
    }

    public function increases(): HasMany
    {
        return $this->hasMany(Increase::class, 'product', 'id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store', 'id');
    }
}
