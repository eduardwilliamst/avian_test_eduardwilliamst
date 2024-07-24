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
        Schema::create('hadiahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('toko_id');
            $table->string('doc_number');
            $table->boolean('received')->default(false);
            $table->date('received_date')->nullable();
            $table->string('failed_reason')->nullable();
            $table->timestamps();
    
            $table->foreign('toko_id')->references('id')->on('tokos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiahs');
    }
};
