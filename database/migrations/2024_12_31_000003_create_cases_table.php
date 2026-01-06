<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('practice_area_id')->nullable()->constrained()->nullOnDelete();
            $table->string('client_name')->nullable();
            $table->text('short_description');
            $table->longText('description');
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('result')->nullable();
            $table->date('case_date')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
