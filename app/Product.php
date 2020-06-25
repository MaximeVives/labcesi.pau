<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $fillable = [
        'name_product', 'ID_color', 'quantity', 'description', 'ID_material', 'url_pic'
    ];

    protected $primaryKey = 'ID_product';

    public $timestamps = false;
}
