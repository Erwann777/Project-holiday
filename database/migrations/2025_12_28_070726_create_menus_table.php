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
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('name');           // Nama menu
        $table->string('category');       // food, drink, dessert
        $table->integer('price');         // Harga
        $table->text('desc');             // Deskripsi
        $table->string('img');            // Link gambar
        $table->boolean('is_available')->default(true); // Status Stok
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
