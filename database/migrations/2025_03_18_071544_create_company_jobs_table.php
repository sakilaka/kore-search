<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobsTable extends Migration
{
 
    public function up()
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id'); 
            $table->string('name'); 
            $table->string('vacancy'); 
            $table->string('salary'); 
            $table->string('experience'); 
            $table->string('type'); 
            $table->string('location'); 
            $table->date('deadline'); 
            $table->json('skill'); 
            $table->text('description'); 
            $table->text('overview'); 
            $table->text('key_responsibilities'); 
            $table->text('qualification'); 
            $table->text('nice_to_have')->nullable(); 
            $table->text('soft_skill')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_jobs');
    }
}
