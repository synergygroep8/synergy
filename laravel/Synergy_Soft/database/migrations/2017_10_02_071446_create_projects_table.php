<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cid');
            $table->string('projectName');
            $table->boolean('isMaintained');
            $table->string('software');
            $table->string('hardware');
            $table->string('OS');
            $table->string('lastContact');
            $table->string('contactClient');
            $table->integer('creditLimit');

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
        Schema::dropIfExists('tbl_projects');
    }
}
