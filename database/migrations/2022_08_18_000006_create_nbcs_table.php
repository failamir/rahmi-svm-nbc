<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNbcsTable extends Migration
{
    public function up()
    {
        Schema::create('nbcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tweet')->nullable();
            $table->string('prediksi')->nullable();
            $table->string('hasil')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
