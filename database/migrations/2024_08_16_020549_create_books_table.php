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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the book
            $table->string('author'); // Author of the book
            $table->string('isbn')->nullable(); // ISBN, nullable (if applicable)
            $table->string('publisher'); // Publisher
            $table->date('publication_date'); // Publication date
            $table->string('edition')->nullable(); // Edition, nullable (if applicable)
            $table->string('language'); // Language
            $table->integer('pages'); // Number of pages
            $table->text('description'); // Description
            $table->decimal('price', 8, 2); // Price
            $table->string('availability_status')->default('in_stock'); // Availability status, default to 'in_stock'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
