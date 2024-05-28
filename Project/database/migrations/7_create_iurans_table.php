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
        Schema::create('iurans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_warga')->unsigned();;
            $table->string('bulan');
            $table->string('jumlah_iuran');
            $table->string('status');
            $table->timestamps();

            $table->index('id_warga');
            $table
                ->foreign('id_warga')
                ->references('id')
                ->on('wargas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
