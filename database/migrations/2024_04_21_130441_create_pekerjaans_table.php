<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('projectFile');
            $table->string('projectName');
            $table->text('projectDescription');
            $table->string('paymentType');
            $table->integer('per25Payment')->default(0);
            $table->integer('per50Payment')->default(0);
            $table->integer('per75Payment')->default(0);
            $table->integer('per100Payment')->default(0);
            $table->integer('minimumPayment')->default(0);
            $table->integer('maximumPayment')->default(0);
            $table->integer('hourlyPayment')->default(0);
            $table->integer('clientId');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
