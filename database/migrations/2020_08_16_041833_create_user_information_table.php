<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('procedencia')->nullable();
            $table->string('residencia')->nullable();
            $table->string('trabajo')->nullable();
            $table->string('work_place')->nullable();
            $table->string('estudios1')->nullable();
            $table->string('estudios2')->nullable();
            $table->string('email')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('edad')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('hobbie1')->nullable();
            $table->string('hobbie2')->nullable();
            $table->string('hobbie3')->nullable();
            $table->string('hobbie4')->nullable();
            $table->string('hobbie5')->nullable();
            $table->string('hobbie6')->nullable();
            $table->string('status')->nullable();
            $table->date('born')->nullable();
            $table->string('curiosidad1')->nullable();
            $table->string('curiosidad2')->nullable();
            $table->string('curiosidad3')->nullable();
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
        Schema::dropIfExists('user_information');
    }
}
