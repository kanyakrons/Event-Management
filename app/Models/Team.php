<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Team extends Model
{
    use HasFactory;
    public function organizers() : BelongsTo{
        return $this->belongsTo(Organize::class);
    }
    public function team_members() : HasMany{
        return $this->hasMany(TeamMember::class);
    }
}
