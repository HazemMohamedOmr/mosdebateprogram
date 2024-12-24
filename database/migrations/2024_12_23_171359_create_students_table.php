<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invitations_id'); // Foreign key
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('sur_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('personal_photo')->nullable(); // Path to photo
            $table->string('age_range')->nullable();
            $table->string('national_id')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('study_year_program')->nullable();
            $table->text('experience')->nullable();
            $table->timestamps();

            $table->foreign('invitations_id')->references('id')->on('invitations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
