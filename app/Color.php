<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_color', 'ID_product'
    ];

    protected $table = 'colors';

    protected $primaryKey = 'ID_color';
}
