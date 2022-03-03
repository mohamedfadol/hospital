<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name2')->nullable();
            $table->string('image')->nullable();
            $table->longText('about')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('attend')->nullable();
            $table->string('time')->nullable();
            $table->integer('status')->nullable()->defualt(0);

            $table->bigInteger('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');

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
        Schema::dropIfExists('customrs');
    }
}
