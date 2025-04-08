<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Corpus extends Model
{
    use HasFactory;

    protected $fillable = [
        'corpus_name',
        'image_url',
    ];

    public $timestamps = false;
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
