<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->char('code', 10)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
