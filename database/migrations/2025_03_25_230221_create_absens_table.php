<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alfa'])->default('Hadir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absens');
    }
};
