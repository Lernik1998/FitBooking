<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Instructor extends Model
{
    // protected $fillable = ['name', 'email', 'phone', 'is_active'];

    protected $guarded = [];

    // Relación uno a muchos con Actividades
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
