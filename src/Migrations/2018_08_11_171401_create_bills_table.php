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
        Schema::create('bills', function (Blueprint $table){
            $table->increments('id');
            $table->integer('numrange_id')->unsigned();
            $table->integer('canceled_bill_id')->nullable()->unsigned();
            $table->string('number');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('days_to_pay')->default(14);
            $table->integer('netto')->default(0);
            $table->integer('tax_percent')->default(0);
            $table->integer('total')->default(0);
            $table->integer('payed')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('discount_percent')->default(0);
            $table->string('receiver_name')->nullable();
            $table->text('receiver_address')->nullable();
            $table->string('receiver_umstid')->nullable();
            $table->boolean('accepted')->default(0);
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('bills', function(Blueprint $table){
            $table->foreign('numrange_id')->references('id')->on('numranges');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('canceled_bill_id')->references('id')->on('bills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
