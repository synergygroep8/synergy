<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceNr');
            $table->integer('pId');
            $table->date('date');
            $table->integer('invoiceTotal')->length(30);
            $table->boolean('paid')->nullable();
            $table->string('description');
            $table->decimal('BTW');
            $table->string('ledgerNumber');
            $table->timestamps();

            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_invoices');
    }
}
