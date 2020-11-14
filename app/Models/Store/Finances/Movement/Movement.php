<?php

namespace App\Models\Store\Finances\Movement;

use App\Models\Store\Finances\Value;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Value
{
    use HasFactory;

    private DateTime $date;

    public function getDate(): DateTime
    {
        return $this->date;
    }

    protected function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}
