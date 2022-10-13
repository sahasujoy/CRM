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
        Schema::create('mutation_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('mutation_reg_date');
            $table->string('mutation_misscase_no');
            $table->string('individual_land_size');
            $table->string('mutation_dcs');
            $table->string('mutation_dsa');
            $table->string('mutation_drs');
            $table->string('mutation_dbs');
            $table->string('mutation_kcs');
            $table->string('mutation_ksa');
            $table->string('mutation_krs');
            $table->string('mutation_kbs');
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
        Schema::dropIfExists('mutation_registrations');
    }
};
