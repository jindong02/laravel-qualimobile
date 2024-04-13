<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    public $timestamps = false;
    protected $fillable = [
        'nome',
        'email',
    ];
    protected $table = 'Newsletter';

}
