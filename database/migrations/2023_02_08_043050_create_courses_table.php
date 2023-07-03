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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('course_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('institution_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('short');
            $table->string('doc')->nullable();
            $table->longText('desc');
            $table->string('thumb');
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(true);
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
        Schema::dropIfExists('courses');
    }
};
