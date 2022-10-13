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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("file_no");
            $table->string('name1');
            $table->string('customer_id');
            $table->string('father_name1');
            $table->string('mother_name1');
            $table->string('hus_wife_name');
            $table->string('relationship');
            $table->string('nid_no');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('others_file_no');
            $table->string('name2')->nullable();
            $table->string('father_name2')->nullable();
            $table->date('booking_date');
            $table->string('profession');
            $table->string('designation')->nullable();
            $table->string('email');
            $table->string('mailing_address');
            $table->string('permanent_address');
            $table->string('office_address')->nullable();
            $table->string('country');
            $table->string('nominee_name');
            $table->string('relation_with_nominee');
            $table->string('nominee_phone');
            $table->string('nominee_address');
            $table->string('nominee_gets');
            $table->string('building_no');
            $table->string('flat_no');
            $table->string('flat_size');
            $table->string('media_name');
            $table->string('media_phone');
            $table->string('customer_image');
            $table->string('nominee_image');
            $table->string('agreements');
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
        Schema::dropIfExists('customers');
    }
};
