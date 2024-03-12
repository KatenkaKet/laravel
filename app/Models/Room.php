<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
      'corpus_id',
      'room_number',
      'bed_number',
      'price'
    ];
    public function corpus(): BelongsTo
    {
        return $this->belongsTo(Corpus::class);
    }
    public function guest(): BelongsToMany
    {
        return $this->belongsToMany(Guest::class, 'reservations')
            ->withPivot(['check_in', 'check_out']);
    }
}
