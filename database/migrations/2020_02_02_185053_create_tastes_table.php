<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tastes', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('plate_id');
						$table->unsignedBigInteger('user_id');
						$table->datetime('visit_at');
						$table->float('price', 6, 2)->nullable()->default(0);
            $table->timestamps();
						$table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');
						$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						$table->unique(['plate_id', 'user_id', 'visit_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tastes');
    }
}
