<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poa_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('poa_reg_date');
            $table->string('poa_reg_sub_deed_no');
            $table->string('individual_land_size');
            $table->string('mouza_name');
            $table->string('poa_dcs');
            $table->string('poa_dsa');
            $table->string('poa_drs');
            $table->string('poa_dbs');
            $table->string('poa_kcs');
            $table->string('poa_ksa');
            $table->string('poa_krs');
            $table->string('poa_kbs');
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
        Schema::dropIfExists('poa_registrations');
    }
};
