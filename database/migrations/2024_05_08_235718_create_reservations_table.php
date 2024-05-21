<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('NomClient');
            $table->foreign('table_id')->references('id')->on('tables');
            $table->unsignedBigInteger('table_id')->nullable();
            $table->string('NumTable');
            $table->string('DateDemande')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
