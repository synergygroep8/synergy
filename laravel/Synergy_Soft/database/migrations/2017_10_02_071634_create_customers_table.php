<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyName');
            $table->boolean('isActive')->default(1);
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone4')->nullable();
            $table->string('residence1');
            $table->string('address1');
            $table->integer('houseNumber1');
            $table->string('zipCode1');
            $table->string('residence2')->nullable();
            $table->string('address2')->nullable();
            $table->integer('houseNumber2')->nullable();
            $table->string('zipCode2')->nullable();
            $table->string('contactPerson');
            $table->string('faxNumber')->nullable();
            $table->string('initals');
            $table->string('bankaccountNumber');
            $table->boolean('bkr')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('invoices')->nullable();
            $table->string('btwCode')->nullable();
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
        Schema::dropIfExists('tbl_customers');
    }
}
