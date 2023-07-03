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
        Schema::create('admission_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('alt_phone')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guar_name');
            $table->string('guar_ph');
            $table->string('parma_city');
            $table->string('parma_po');
            $table->string('parma_ps');
            $table->string('parma_dist');
            $table->string('parma_state');
            $table->string('parma_pin');
            $table->boolean('addr_same')->default(false);
            $table->string('corrent_city')->nullable();
            $table->string('corrent_po')->nullable();
            $table->string('corrent_ps')->nullable();
            $table->string('corrent_dist')->nullable();
            $table->string('corrent_state')->nullable();
            $table->string('corrent_pin')->nullable();
            $table->string('course_id');
            $table->string('qualifi_name');
            $table->string('qualifi_year');
            $table->string('qualifi_coll');
            $table->string('qualifi_mark');
            $table->string('marksheet_img');
            $table->string('user_img');
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
        Schema::dropIfExists('admission_forms');
    }
};
