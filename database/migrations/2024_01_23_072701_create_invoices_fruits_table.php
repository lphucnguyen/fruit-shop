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
        Schema::create('fruit_invoice', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('invoice_id');
            $table->foreignUuid('fruit_id');
            $table->string('category_name');
            $table->integer('quantity');

            $table->foreign('invoice_id')->references('id')
                 ->on('invoices')->onDelete('cascade');
            $table->foreign('fruit_id')->references('id')
                ->on('fruits')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_fruits');
    }
};
