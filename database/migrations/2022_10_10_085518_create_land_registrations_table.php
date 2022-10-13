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
        Schema::create('land_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('land_reg_date');
            $table->string('land_reg_sub_deed_no');
            $table->string('individual_land_size');
            $table->string('mouza_name');
            $table->string('land_dcs');
            $table->string('land_dsa');
            $table->string('land_drs');
            $table->string('land_dbs');
            $table->string('land_kcs');
            $table->string('land_ksa');
            $table->string('land_krs');
            $table->string('land_kbs');
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
        Schema::dropIfExists('land_registrations');
    }
};
