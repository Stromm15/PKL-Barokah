<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkls', function (Blueprint $table) {
            $table->id('id_pkl');
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswas')->cascadeOnDelete();

            $table->foreignId('id_perusahaan');
            $table->foreignId('id_pembimbing');

            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaans')->cascadeOnDelete();
            $table->foreign('id_pembimbing')->references('id_pembimbing')->on('pembimbings')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkls');
    }
};
