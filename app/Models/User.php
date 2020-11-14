<?php

namespace App\Models;

use App\Models\General\Formal\Category as GeneralCategory;
use App\Models\Store\Formal\Category as StoreCategory;
use App\Models\Store\Formal\Store;
use App\Models\Store\Product\Category as ProductCategory;
use App\Models\Store\Product\Increase;
use App\Models\Store\Product\Product;
use App\Models\Store\Team\Employee\Employee;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function createdEmployees(): HasMany
    {
        return $this->hasMany(Employee::class, 'created_by', 'id');
    }

    public function createdGeneralCategories(): HasMany
    {
        return $this->hasMany(GeneralCategory::class, 'created_by', 'id');
    }

    public function createdIncreases(): HasMany
    {
        return $this->hasMany(Increase::class, 'created_by', 'id');
    }

    public function createdProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'created_by', 'id');
    }

    public function createdProductsCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'created_by', 'id');
    }

    public function createdStores(): HasMany
    {
        return $this->hasMany(Store::class, 'created_by', 'id');
    }

    public function createdStoresCategories(): HasMany
    {
        return $this->hasMany(StoreCategory::class, 'created_by', 'id');
    }

    public function receivedIncreases(): HasMany
    {
        return $this->hasMany(Increase::class, 'received_by', 'id');
    }

    public function worksAs(): HasMany
    {
        return $this->hasMany(Employee::class, 'user', 'id');
    }
}
