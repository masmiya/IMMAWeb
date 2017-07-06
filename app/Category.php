<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    protected $fillable = [
        'name',
        'order',
        'info',
    ];

    protected $table = 'categories';

    // public function subcategories() {
    //     $subcategories = SubCategory::where('category_id', $this->id)->orderBy('order')->get();

    //     return $subcategories;
    // }

    public function products() {
        $products = Product::where('category_id', $this->id)->orderBy('imma_id_code')->orderBy('order')->get();

        return $products;
    }

    public function productsOnly() {
        $products = Product::where('category_id', $this->id)->where('sub_product_of', '')->orderBy('imma_id_code')->orderBy('order')->get();

        return $products;
    }
}
