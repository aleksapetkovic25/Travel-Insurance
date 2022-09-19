<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->comment('0-vest / 1-post');
            $table->dateTime('date-created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date-published')->nullable();
            $table->dateTime('date-archived')->nullable();
            $table->string('title');
            $table->string('short-description')->nullable();
            $table->longText('description');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
