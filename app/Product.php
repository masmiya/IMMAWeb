<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sub_category_id',
        'imma_id_code',
        'order',
        'name',
        'description',
        'image_url',
        'rec_quantity_10',
        'rec_quantity_20',
        'rec_quantity_30',
        'rec_quantity_40',
        'comment',
        'more_than_24',
        'less_than_24',
        'less_than_2',
        'dosage',
        'reference',
        'ordering_size',
        'quantity_required',
    ];

    protected $table = 'products';

    public function subproducts() {
        $subproducts = SubProduct::where('product_id', $this->id)->get();
        return $subproducts;
    }
}
