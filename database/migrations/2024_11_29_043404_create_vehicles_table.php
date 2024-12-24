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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('nopol')->unique();
            $table->foreignId('cust_id')->constrained(
                table: 'customers',
                indexName: 'vehicle_customer_id'
            );
            $table->string('merk');
            $table->string('model');
            $table->year('year');
            $table->string('chasis_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
