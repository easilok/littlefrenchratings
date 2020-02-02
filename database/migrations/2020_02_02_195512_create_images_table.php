<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('path')->unique();
						$table->unsignedInteger('order')->default(0);
						$table->boolean('visible')->default(true);
						$table->unsignedBigInteger('plate_id');
						$table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
						$table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');
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
        Schema::dropIfExists('images');
    }
}
