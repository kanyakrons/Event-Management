<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subdistrict extends Model
{
    use HasFactory;
    protected $table = 'mastersubdistrict';

    public function province(): BelongsTo
    {
        return $this->BelongsTo(District::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
