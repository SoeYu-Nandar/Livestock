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
        Schema::table('purchases', function (Blueprint $table) {
             // Drop the existing foreign key constraint
             $table->dropForeign(['payment_id']);

             // Modify the column to string type and nullable
             $table->string('payment_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            
            $table->unsignedBigInteger('payment_id')->nullable(false)->change();

            // Re-add the foreign key constraint if needed
            $table->foreign('payment_id')->references('id')->on('puchases')->onDelete('cascade');
        });
        
    }
};
