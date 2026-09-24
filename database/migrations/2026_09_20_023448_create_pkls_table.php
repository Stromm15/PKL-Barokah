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
            $table->foreignId('id_perusahaan')->constrained('perusahaans', 'id_perusahaan')->cascadeOnDelete();
            $table->foreignId('id_pic')->nullable()->constrained('users', 'id')->cascadeOnDelete();

            // $table->foreignId('id_perusahaan');
            // $table->foreignId('id_pic')->nullable();

            // $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaans')->cascadeOnDelete();
            // $table->foreign('id_pic')->references('id_pic')->on('pics')->cascadeOnDelete();

            $table->date('tgl_mulai');
            $table->date('tgl_selesai');

            $table->string('status');
            $table->integer('nilai_1')->nullable();
            $table->integer('nilai_2')->nullable();
            $table->integer('nilai_3')->nullable();
            $table->integer('nilai_4')->nullable();
            $table->float('rata_rata')->nullable();

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
