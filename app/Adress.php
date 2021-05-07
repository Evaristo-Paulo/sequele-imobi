<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'street', 'neighbourhood', 'municipe_id'
    ];
}
