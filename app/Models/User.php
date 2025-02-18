<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'role',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* Relación Muchos a Muchos (Genera una tabla intermedia que relaciona los dos modelos)
     Un usuario puede reservar múltiples planes a través de la tabla intermedia reservations */
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'reservations');
    }

    // Un usuario puede hacer muchas reservas
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


    /* NO USADO POR EL MOMENTO, PERO NO SE BORRA PORQUE ES UNA BUENA PRACTICA Y
    SE IMPLEMENTARÁ PARA EL PROYECTO FINAL. 
    Funciones para verificar el rol del usuario
     public function isAdmin()
     {
         return $this->role === 'admin';
     }
     public function isClient()
     {
         return $this->role === 'cliente';
     }*/

}
