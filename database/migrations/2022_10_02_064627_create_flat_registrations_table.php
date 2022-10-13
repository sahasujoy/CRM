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
        Schema::create('flat_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('flat_reg_date');
            $table->string('flat_reg_sub_deed_no');
            $table->string('flat_size');
            $table->string('land_size');
            $table->string('mouza_name');
            $table->string('flat_dcs');
            $table->string('flat_dsa');
            $table->string('flat_drs');
            $table->string('flat_dbs');
            $table->string('flat_kcs');
            $table->string('flat_ksa');
            $table->string('flat_krs');
            $table->string('flat_kbs');
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
        Schema::dropIfExists('flat_registrations');
    }
};
