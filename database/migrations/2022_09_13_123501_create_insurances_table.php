<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->comment('0-individualno / 1-grupno');
            $table->string('usr_name');
            $table->string('usr_lastname');
            $table->string('phone');
            $table->date('date-birth')->nullable()->default(null);
            $table->date('start-date');
            $table->date('end-date');
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
        Schema::dropIfExists('insurances');
    }
}
