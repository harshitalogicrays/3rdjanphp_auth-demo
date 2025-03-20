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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string(('category'));
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->integer('selling_price');
            $table->integer('original_price');
            $table->string('status')->default('0')->comment('0=visible 1=hidden');
            $table->integer('qty');
			$table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
