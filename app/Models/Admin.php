<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {

    use HasFactory,
        Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'nome',
        'perfil',
        'login',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    protected $table = 'Admin';

}
