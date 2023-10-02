<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    public function budget(): HasOne
    {
        return $this->hasOne(Budget::class);
    }
    public function applications(): HasMany {
        return $this->hasMany(Application::class);
    }
    public function province(): BelongsTo{
        return $this->belongsTo(Province::class);
    }
    public function district(): BelongsTo{
        return $this->belongsTo(District::class);
    }
    public function subdistrict(): BelongsTo{
        return $this->belongsTo(Subdistrict::class);
    }
    public function organizer() : HasOne{
        return $this->hasOne(Organizer::class);
    }
}
