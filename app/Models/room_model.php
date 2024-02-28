<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class room_model extends Model
{
    protected $table = 'room';
    use HasFactory;
    public function corpus(): BelongsTo
    {
        return $this->belongsTo(corpus_model::class);
    }
}
