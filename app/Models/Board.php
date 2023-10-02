<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Board extends Model
{
    use HasFactory;
    public function organizers() : BelongsTo{
        return $this->belongsTo(Organizer::class);
    }
    public function board_details() : HasMany{
        return $this->hasMany(BoardDetail::class);
    }
}
