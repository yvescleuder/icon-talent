<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('cep')->index()->unique();
            $table->string('address');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->integer('ibge')->nullable();
            $table->integer('gia')->nullable();
            $table->integer('ddd');
            $table->integer('siafi')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
