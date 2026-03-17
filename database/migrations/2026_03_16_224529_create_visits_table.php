<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('page_type'); // project/property/offer/blog/static
            $table->unsignedBigInteger('page_id')->nullable();

            $table->string('page_slug')->nullable();
            $table->string('url');

            $table->string('visitor_ip')->nullable();
            $table->text('user_agent')->nullable();

            $table->string('device_type')->nullable(); // mobile/desktop/tablet

            $table->string('referrer_url')->nullable();

            $table->string('session_id')->nullable();

            $table->string('country')->nullable();

            $table->timestamp('visited_at')->useCurrent();
            $table->timestamps();

            // indexes (important)
            $table->index('page_type');
            $table->index('page_id');
            $table->index('visitor_ip');
            $table->index('session_id');
            $table->index('visited_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
