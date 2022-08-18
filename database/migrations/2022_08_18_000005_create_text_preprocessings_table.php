<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextPreprocessingsTable extends Migration
{
    public function up()
    {
        Schema::create('text_preprocessings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tweet')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
