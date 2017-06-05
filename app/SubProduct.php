<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    protected $fillable = [
        'product_id',
        'imma_id_code',
        'description',
        'image_url',
    ];

    protected $table = 'sub_products';
}
