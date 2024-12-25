<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('sur_name')->nullable();
            $table->string('age_range')->nullable();
            $table->string('national_id')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('university_name')->nullable();
            $table->string('university_specialization')->nullable();
            $table->string('team_leader')->nullable();
            $table->date('graduation_date')->nullable();
            $table->json('heard_about')->nullable();
            $table->json('reason_participation')->nullable();
            $table->boolean('attended')->default(false); // Tracks attendance
            $table->string('invitation_key')->unique();  // Unique invitation key
            $table->tinyInteger('type'); // Form type: 0 or 1
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
        Schema::dropIfExists('invitations');
    }
}
