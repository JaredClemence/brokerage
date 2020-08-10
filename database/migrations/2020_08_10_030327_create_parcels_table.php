<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('apn');
            $table->string('lot')->default('');
            $table->string('block')->default('');
            $table->string('parcel_num')->default('');
            $table->string('street')->default('');
            $table->string('unit')->default('');
            $table->string('city')->default('Bakersfield');
            $table->string('state')->default('CA');
            $table->string('zip')->default('');
            $table->unique(['apn','unit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}
