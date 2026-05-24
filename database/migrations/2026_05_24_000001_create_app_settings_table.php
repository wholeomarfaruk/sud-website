<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 50)->index();          // analytics | seo | custom
            $table->string('key', 100);                    // gtm_id | meta_pixel_id | ...
            $table->longText('value')->nullable();         // the actual setting value
            $table->string('type', 30)->default('text');   // text | code | toggle
            $table->string('label')->nullable();           // human-readable label
            $table->text('description')->nullable();       // help text shown in admin
            $table->boolean('is_public')->default(false);  // expose via API?
            $table->timestamps();

            $table->unique(['group', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
