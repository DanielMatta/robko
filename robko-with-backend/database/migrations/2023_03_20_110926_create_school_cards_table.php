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
        Schema::create('school_cards', function (Blueprint $table) {
            $table->id();
            $table->string("school_lesson_id");
            $table->string("school_classroom_id");
            $table->tinyInteger("period");
            $table->string("weeks");
            $table->string("days");
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
        Schema::dropIfExists('school_cards');
    }
};
