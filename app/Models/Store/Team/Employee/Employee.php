<?php

namespace App\Models\Store\Team\Employee;

use App\Models\Store\Formal\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    public const TYPE = [
        'OWNER' => [
            'id' => 1,
            'title' => 'Proprietário(a)'
        ],
        'MANAGER' => [
            'id' => 2,
            'title' => 'Gerente'
        ],
        'SELLER' => [
            'id' => 3,
            'title' => 'Vendedor(a)'
        ],
        'CONSULTANT' => [
            'id' => 4,
            'title' => 'Consultor(a)'
        ],
        'UNLINKED' => [
            'id' => null,
            'title' => 'Sem vínculo'
        ]
    ];

    protected $table = "employees";

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store', 'id');
    }

    public function type(): array
    {
        foreach (Employee::TYPE as $type) {
            if ($this->type === $type['id']) {
                return $type;
            }
        }

        return Employee::TYPE['UNLINKED'];
    }

    public static function search(User $user, Store $store)
    {
        return $user->worksAs()->where('store', '=', $store->id);
    }

    public static function exists(User $user, Store $store): bool
    {
        return (Employee::find($user, $store))->count();
    }
}
