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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('article_name')->nullable();
            $table->string('acheté_de')->nullable();
            $table->string('date_achat')->nullable();
            $table->string('acheté_par')->nullable();
            $table->string('montant')->nullable();
            $table->string('payé_par')->nullable();
            $table->string('status')->nullable();
            $table->string('attachments')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
