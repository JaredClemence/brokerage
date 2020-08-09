<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('holder_id')->comment('Reference to User\'s table')->nullable();
            $table->string('name')->comment('Legal name recognized by the state.');
            $table->string('identifier')->comment('String text identifier.');
            $table->string('type')->comment('License classification.');
            $table->date('issued_on')->comment('Date license was issued');
            $table->date('expires_on')->comment('Date at which license naturally expires.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
