<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('name')->unique();
						$table->string('slug')->unique();
						$table->string('description');
						$table->unsignedInteger('type')->default(1);
						$table->unsignedInteger('order')->default(1);
						$table->boolean('required')->default(true);
						$table->boolean('enable');
            $table->timestamps();
				});

				Schema::create('plate_rating', function (Blueprint $table) {
						$table->unsignedBigInteger('rating_id');
						$table->unsignedBigInteger('taste_id');
						$table->unsignedInteger('rating_value');
						$table->text('rating_text');
						$table->timestamps();
						$table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
						$table->foreign('taste_id')->references('id')->on('tastes')->onDelete('cascade');
						$table->primary(['rating_id', 'taste_id']);
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plate_rating');
        Schema::dropIfExists('ratings');
    }
}
