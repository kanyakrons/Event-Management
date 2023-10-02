<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizer extends Model
{
    use HasFactory, SoftDeletes;
    
    public function users() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function organizer_members() : HasMany{
        return $this->hasMany(OrganizerMember::class);
    }
    public function boards() : HasMany{
        return $this->hasMany(Board::class);
    }
    public function teams() : HasMany{
        return $this->hasMany(Team::class);
    }
    public function event() : HasMany{
        return $this->hasMany(Event::class);
    }
}
