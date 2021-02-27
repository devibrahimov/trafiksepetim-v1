<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanybusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companybusiness', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->string('company_title');
            $table->string('business_name')->nullable();
            $table->string('company_type');
            $table->string('chamber_of_commerce');
            $table->string('trade_registry_number');
            $table->string('kep_address');
            $table->string('ilvergi_mudurlugu');
            $table->string('tax_number');
            $table->json('yetkilibilgileri');
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
        Schema::dropIfExists('companybusiness');
    }
}
