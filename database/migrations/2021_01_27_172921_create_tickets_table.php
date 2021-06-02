<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('ak');
            $table->enum('FlightNumber', ['A51', 'A52'])->default('A51');
            $table->enum('bagazas', ['0kg','10kg','20kg'])->default('0kg');
            $table->enum('from', ['Vilnius','Frankfurt', 'London'])->default('Vilnius');
            $table->enum('to', ['Riga','Paris', 'Oslo'])->default('Riga');
            $table->text('comments');

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
        Schema::dropIfExists('tasks');
    }
}
