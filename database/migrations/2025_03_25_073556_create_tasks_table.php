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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('ten_cong_viec');
            $table->tinyInteger('trang_thai')->default(0);
            $table->date('ngay_het_han');
            $table->foreignId('nguoi_phan_cong_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('nguoi_lam_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
