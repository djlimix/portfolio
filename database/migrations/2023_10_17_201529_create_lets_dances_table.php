<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lets_dances', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('guest');
            $table->string('soundcloud');
            $table->string('google_podcasts');
            $table->string('apple_podcasts');
            $table->string('hypeddit');
            $table->timestamps();
        });
    }
};
