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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderer_name');
            $table->string('orderer_phone');
            $table->string('orderer_id');
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('accepter_level1_id')->constrained('users');
            $table->foreignId('accepter_level2_id')->constrained('users');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
