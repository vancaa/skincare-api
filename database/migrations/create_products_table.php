<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('brand');
        //     $table->string('category');
        //     $table->text('description')->nullable();
        //     $table->integer('stock');
        //     $table->decimal('price', 10, 2);
        //     $table->boolean('is_active')->default(true);
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        // Schema::dropIfExists('products');
    }
};
