<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->default("")->unique();
            $table->string('default');
            $table->unsignedBigInteger('role_id');
						$table->boolean('enable')->default(true);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('configuration_user', function (Blueprint $table) {
            $table->unsignedBigInteger('configuration_id');
            $table->unsignedBigInteger('user_id');
            $table->string('value');
            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['user_id', 'configuration_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuration_user');
        Schema::dropIfExists('configurations');
    }
}
