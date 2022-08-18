<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tweet')->nullable();
            $table->string('sentimen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
