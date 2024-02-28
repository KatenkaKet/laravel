<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class corpus_model extends Model
{

    use HasFactory;
    public function rooms(): HasMany
    {
        return  $this->hasMany(room_model::class);
    }
    protected $table = 'corpus';
}
