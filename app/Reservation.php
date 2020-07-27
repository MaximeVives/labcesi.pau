<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'ID_reservation';
    public $timestamps = false;
}
