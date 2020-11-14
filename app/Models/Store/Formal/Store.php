<?php

namespace App\Models\Store\Formal;

use App\Models\General\Formal\Category;
use App\Models\Store\Product\Increase;
use App\Models\Store\Team\Employee\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    protected $table = "stores";

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'stores_categories', 'store', 'category', 'id', 'id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'store', 'id');
    }

    public function increases(): HasMany
    {
        return $this->hasMany(Increase::class, 'store', 'id');
    }
}
