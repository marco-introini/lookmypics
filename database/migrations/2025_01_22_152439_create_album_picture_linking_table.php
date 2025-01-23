<?php

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('album_picture', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Picture::class);
            $table->foreignIdFor(Album::class);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('album_picture');
    }
};
