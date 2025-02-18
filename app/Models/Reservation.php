<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'user_id',
    //     'activity_id',
    //     'plan_id',
    // ];
    protected $guarded = [];

    // Relación 1 a uno (uno a uno) con User --> Una reserva pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Una reserva pertenece a un plan
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    // Relación 1 a uno (uno a uno) con Activity --> Una reserva pertenece a una actividad
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
