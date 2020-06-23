<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_material', 'ID_product'
    ];

    protected $table = 'materials';

    protected $primaryKey = 'ID_material';
}
