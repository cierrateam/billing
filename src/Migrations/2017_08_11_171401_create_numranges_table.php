<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumrangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numranges', function (Blueprint $table){
            $table->increments('id');

            $table->integer('next_range_id')->unsigned()->nullable();
            $table->integer('storno_numrange_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->integer('starts_at')->default(1);
            $table->integer('increment')->default(1);
            $table->boolean('binding')->default(0);

            $table->timestamps();
        });

        Schema::table('numranges', function(Blueprint $table) {
            $table->foreign('next_range_id')->references('id')->on('numranges');
            $table->foreign('storno_numrange_id')->references('id')->on('numranges');            $table->foreign('next_range_id')->references('id')->on('numranges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numranges');
    }
}
