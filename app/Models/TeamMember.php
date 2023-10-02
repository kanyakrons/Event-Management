<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TeamMember extends Model
{
    use HasFactory;
    public function teams() : BelongsTo{
        return $this->belongsTo(Team::class);
    }

    

}
