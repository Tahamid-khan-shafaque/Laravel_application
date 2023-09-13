<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    public function up()
{
    Schema::create('form_data', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('number');
        $table->string('department');
        $table->string('bloodgroup');
        $table->string('gender');
        $table->text('skillset');
        $table->string('photo')->nullable(); // Add this line for the new photo field
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('form_data');
    }
}
