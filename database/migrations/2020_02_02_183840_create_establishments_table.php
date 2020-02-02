<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('name');
						$table->string('address');
						$table->string('parish')->nullable();
						$table->string('city')->nullable();
						$table->string('gps')->nullable();
						$table->string('telephone')->nullable();
						$table->string('telephone2')->nullable();
						$table->string('telephone3')->nullable();
						$table->string('email')->nullable();
						$table->boolean('card')->default(true);
						$table->string('timetable')->nullable();
						$table->string('obs')->default('');
						$table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establishments');
    }
}
