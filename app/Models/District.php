<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;
    protected $table = 'masterdistrict';

    public function province(): BelongsTo
    {
        return $this->BelongsTo(Province::class);
    }
    public function subdistrict(): HasOne
    {
        return $this->HasOne(Subdistrict::class);
    }
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
