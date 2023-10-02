<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;
    protected $table = 'masterprovince';

    public function district(): HasOne
    {
        return $this->HasOne(District::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
