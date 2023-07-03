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
        Schema::create('appointment_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('purpose');
            $table->foreignId('service_id')->nullable()->constrained()->onUpdate('cascade');
            $table->foreignId('course_id')->nullable()->constrained()->onUpdate('cascade');
            $table->foreignId('institution_id')->nullable()->constrained()->onUpdate('cascade');
            $table->dateTime('datetime');
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('appointment_forms');
    }
};
