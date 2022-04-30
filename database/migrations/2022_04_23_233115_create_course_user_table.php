<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
             Schema::create('course_user', function (Blueprint $table) {
         $table->id();
             $table->integer('user_id')->unsigned();

            $table->integer('course_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')

              ->onDelete('cascade');

            $table->foreign('course_id')->references('id')->on('courses')

              ->onDelete('cascade');
            $table->boolean('enroll_flag')->default('0');
 $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}