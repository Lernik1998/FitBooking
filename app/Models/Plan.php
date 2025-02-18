<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    // protected $fillable = [
    //     'name',
    //     'price',
    //     'duration',
    //     'image',
    //     'description',
    // ];

    protected $guarded = [];

    // Un plan puede ser reservado por muchos usuarios
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Relación uno a muchos con Activity
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
