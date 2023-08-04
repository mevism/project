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
        Schema::create('admission_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id', 12);
            $table->foreign('application_id')->references('application_id')->on('applications')->onUpdate('cascade')->onDelete('cascade');
            $table->string('user_id', 12);
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('cod_status')->default(0);
            $table->string('cod_comments', 128)->nullable();
            $table->integer('finance_status')->nullable();
            $table->string('payment', 16)->nullable();
            $table->integer('registrar_status')->nullable();
            $table->string('registrar_comment', 128)->nullable();
            $table->integer('medical_status')->nullable();
            $table->string('medical_comments', 128)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('admission_approvals');
    }
};
