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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->boolean('status')->default(false);// active, inactive
            $table->integer('hero_video_id')->nullable();
            $table->integer('featured_image_id')->nullable();
            $table->json('hero_image_id')->nullable();
            $table->string('project_status')->nullable();
            $table->string('project_type')->nullable();


            //content
            $table->string('area_measurement')->nullable();
            $table->string('bedroom_count')->nullable();
            $table->string('bathroom_count')->nullable();
            $table->string('parking_count')->nullable();
            $table->longText('description')->nullable();
            $table->json('additional_info')->nullable(); //json
            $table->json('address')->nullable(); //json
            $table->text('embaded_map')->nullable();
            $table->json('gallery')->nullable(); //json
            $table->json('videos')->nullable(); //json
            $table->json('amenities')->nullable(); //json
            //seo
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('meta_image_id')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');

    }
};
