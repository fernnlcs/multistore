<?php

namespace App\Models\Store\Finances;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    public const OFFICIAL_CURRENCY = "BRL";
    public const OFFICIAL_CURRENCY_SYMBOL = "R$";

    private float $value;

    public function getValue(): float
    {
        return $this->value;
    }

    protected function setValue(float $value): void
    {
        if ($value != null && $value >= 0) {
            $this->value = $value;
        }
    }
}
