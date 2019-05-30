<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('phone_a', 15);
            $table->string('phone_b', 15)->nullable();
            $table->string('email', 191)->unique();
            $table->text('address');
            // $table->year('year');
            // $table->string('turno', 18);
            // $table->enum('type', ['m', 't', 'n'])->default('m');
            $table->enum('type', ['m', 't']);
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
        Schema::dropIfExists('alunos');
    }
}
