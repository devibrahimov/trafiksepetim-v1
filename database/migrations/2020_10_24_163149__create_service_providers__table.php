<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('number')->unique();
            $table->string('password');
            $table->unsignedBigInteger('category');
            $table->string('service_name');
            $table->string('service_profil_photo')->nullable();
            $table->string('service_cover_photo')->nullable();
            $table->string('sozlesme');
            $table->string('tckimlik')->unique();
            $table->string('company_title');
            $table->string('business_name')->nullable();
            $table->string('kep_address');
            $table->string('ilvergi_mudurlugu');
            $table->string('tax_number');
            $table->string('ceptelefonu')->unique();
            $table->string('istelefonu')->nullable();
            $table->string('il');
            $table->string('ilce');
            $table->text('adress');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('service_providers');
    }
}
