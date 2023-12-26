<?php

use App\Models\Picture;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('picture_views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Picture::class)
                ->constrained();
            $table->string('ip_address');
            $table->string('browser_info');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image_views');
    }
};
