<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicant_id', 32);
            $table->foreign('applicant_id')->references('applicant_id')->on('applicant_contacts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('institution', 64);
            $table->string('qualification', 64);
            $table->string('level', 16);
            $table->string('start_date', 10);
            $table->string('exit_date', 10);
            $table->string('certificate', 64)->nullable();
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
        Schema::dropIfExists('education');
    }
};
