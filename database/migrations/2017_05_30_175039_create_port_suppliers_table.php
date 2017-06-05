<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->default('Company Name');
            $table->string('issa_membership_number')->nullable();
            $table->string('website')->nullable();
            $table->string('category')->nullable();
            $table->string('specialised_in')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('hours')->nullable();
            $table->string('email')->nullable();

            $table->string('contact1_name')->nullable();
            $table->string('contact1_mobile')->nullable();
            $table->string('contact2_name')->nullable();
            $table->string('contact2_mobile')->nullable();
            $table->text('also_serves')->nullable();
            $table->text('iso')->nullable();

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
        Schema::dropIfExists('port_suppliers');
    }
}
