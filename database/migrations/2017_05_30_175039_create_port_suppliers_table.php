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
            $table->integer('port_id');
            $table->string('company_name')->default('Company Name');
            $table->string('issa_membership_number')->nullable();
            // $table->string('website')->nullable();
            $table->string('category')->nullable();
            $table->string('office')->nullable();
            $table->string('specialised_in')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('telex')->nullable();
            $table->string('hours')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('contact1_name')->nullable();
            $table->string('contact1_mobile')->nullable();
            $table->string('contact2_name')->nullable();
            $table->string('contact2_mobile')->nullable();
            $table->text('also_serves')->nullable();
            $table->string('legal_entity')->nullable();
            // $table->text('iso')->nullable();
            $table->string('port_member_name')->nullable();
            $table->string('port_member_urls')->nullable();

            $table->string('port_urls')->nullable();
            $table->string('country_name')->nullable();
            $table->string('country_urls')->nullable();
            $table->string('countrys_port_member_id')->nullable();
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
