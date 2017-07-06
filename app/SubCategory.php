<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'order',
    ];
    public $incrementing = false;
    protected $table = 'sub_categories';

    public function products() {
    	$products = Product::where('sub_category_id', $this->id)->orderBy('order')->get();
    	return $products;
    }
}
