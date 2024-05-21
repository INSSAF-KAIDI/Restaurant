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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreign('ligne__achats_id')->references('id')->on('ligne__achats'); 
            $table->unsignedBigInteger('ligne__achats_id')->nullable();
            $table->string('no_invoice')->nullable();
            $table->string('designation')->nullable();
            $table->decimal('prix', 10,2);
            $table->string('quantite')->nullable();
            $table->decimal('montant', 10, 2);
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
        Schema::dropIfExists('achats');
    }
};
