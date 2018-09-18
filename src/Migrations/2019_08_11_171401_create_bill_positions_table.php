<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_positions', function (Blueprint $table){
            $table->increments('id');
            $table->integer('bill_id')->unsigned()->index();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('amount')->default(1);
            $table->string('unit')->default('piece');
            $table->string('price');
            $table->integer('percent_discount')->default(0);
            $table->timestamps();
        });
        Schema::table('bill_positions', function(Blueprint $table){
            $table->foreign('bill_id')->references('id')->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_positions');
    }
}
