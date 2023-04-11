<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $connection = 'ws';
    public $timestamps = false;
    protected $table = 'movimientos';
}
