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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('subject')->nullable();
            $table->text('message')->nullable();

            $table->string('source_page')->nullable(); // contact / property / offer
            $table->text('source_url')->nullable();

            $table->foreignId('property_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->enum('status', ['new','read','replied'])
                ->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
