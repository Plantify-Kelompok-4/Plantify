<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');  
            $table->string('name'); 
            $table->decimal('area', 8, 2); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
