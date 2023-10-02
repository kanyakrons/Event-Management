<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardDetail extends Model
{
    use HasFactory;
    public function boards() : BelongsTo{
        return $this->belongsTo(Board::class);
    }
}
