<?php

namespace App\Models\General\Formal;

use App\Models\Store\Formal\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "general_categories";

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'stores_categories', 'category', 'store', 'id', 'id');
    }
}
