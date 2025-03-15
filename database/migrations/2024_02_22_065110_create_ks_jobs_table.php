<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ks_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('company_name');
            $table->text('summary');
            $table->text('description');
            $table->text('requirement');
            $table->timestamp('deadline');
            $table->integer('vacancy');
            $table->string('location');
            $table->integer('vacancy');
            $table->float('exp_min');
            $table->float('exp_max');
            $table->enum('exp_type', ['month', 'year']);
            $table->string('industry_type');
            $table->string('employment_type');
            $table->string('company_image');
            $table->string('role');
            $table->decimal('salary_min')->nullable();
            $table->decimal('salary_max')->nullable();
            $table->string('salary_type')->nullable();
            $table->string('key_skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ks_jobs');
    }
}
