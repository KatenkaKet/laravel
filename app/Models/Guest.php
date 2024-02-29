<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    use HasFactory;
    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'reservations')
            ->withPivot(['check_in', 'check_out']);
    }
}
