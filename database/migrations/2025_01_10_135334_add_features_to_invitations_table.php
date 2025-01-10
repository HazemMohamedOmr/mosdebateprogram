<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->boolean('card_type')->nullable();
            $table->string('region')->nullable();
            $table->string('academic_qualifications')->nullable();
            $table->string('city')->nullable();
            $table->string('employer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'nationality',
                'card_type',
                'region',
                'city',
                'academic_qualifications',
                'employer',
            ]);
        });
    }
}
