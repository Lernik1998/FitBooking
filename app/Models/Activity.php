<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    // protected $fillable = ['name', 'description', 'image', 'price', 'duration', 'instructor_id'];

    protected $guarded = [];

    // Relación 1 a muchos (uno a muchos) con Plan
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    // Relación 1 a uno (uno a uno) con Instructor
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}
