<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sub_product_of',
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
    protected $appends = ['image_full_path', 'has_subproduct'];

    protected $table = 'products';

    public function subproducts() {
        $subproducts = Product::where('sub_product_of', $this->imma_id_code)->get();
        return $subproducts;
    }

    public function getImageFullPathAttribute() {
        if ($this->image_url != null && $this->image_url != "")
            return asset($this->image_url);
        else
            return "";
    }

    public function getHasSubproductAttribute() {
        $s = Product::where('sub_product_of', $this->imma_id_code)->get()->first();

        if($s == null) 
            return false;
        else 
            return true;
    }
}
