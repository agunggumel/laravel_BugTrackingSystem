<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('Case_Name');
            $table->string('Des_case');
            $table->unsignedBigInteger('Project_id')->nullable();
            $table->unsignedBigInteger('Modul_id')->nullable();
            $table->string('Bug_Priority');
            $table->string('Bug_Status');
            $table->string('file_path')->nullable();
            $table->foreign('Project_id')->references('id')->on('projects');
            $table->foreign('Modul_id')->references('id')->on('moduls');
            $table->string('namaFile');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
