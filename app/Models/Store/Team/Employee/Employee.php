<?php

namespace App\Models\Store\Team\Employee;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public const owner = ['id' => 1, 'title' => 'Proprietário(a)'];
    public const manager = ['id' => 2, 'title' => 'Gerente'];
    public const seller = ['id' => 3, 'title' => 'Vendedor(a)'];
    public const consultant = ['id' => 4, 'title' => 'Consultor(a)'];

}
