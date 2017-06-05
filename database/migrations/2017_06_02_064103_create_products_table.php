<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_category_id');
            $table->string('imma_id_code')->nullable();
            $table->integer('order')->nullable();
            $table->string('name')->default('Product Name');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('rec_quantity_10')->nullable();
            $table->integer('rec_quantity_20')->nullable();
            $table->integer('rec_quantity_30')->nullable();
            $table->integer('rec_quantity_40')->nullable();
            $table->text('comment')->nullable();

            $table->string('more_than_24')->nullable();
            $table->string('less_than_24')->nullable();
            $table->string('less_than_2')->nullable();

            $table->string('dosage')->nullable();
            $table->string('reference')->nullable();

            $table->string('ordering_size')->nullable();
            $table->string('quantity_required')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
