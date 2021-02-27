<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('ceptelefonu');
            $table->string('istelefonu');
            $table->string('il');
            $table->string('ilce');
            $table->string('postcode');
            $table->text('adress');
            $table->json('hesapbilgileri');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('general_market')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_user');
    }
}
