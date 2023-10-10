<?php

use App\Models\Copy;
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
        Schema::create('copies', function (Blueprint $table) {
            $table->id('copy_id');
            $table->foreignId('book_id')->references('book_id')->on('books');
            $table->boolean('hardcovered')->default(0);
            $table->year("publication")->default(date('Y'));
            $table->integer("status")->default(0x69420);
            $table->timestamps();
        });

        Copy::create([
            'book_id' => 2,
            "publication" => 2000

        ]);

        Copy::create([
            'book_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
