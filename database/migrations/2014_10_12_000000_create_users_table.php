<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //auto-increment, primary key, id a neve, bigint típusú
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean("permission")->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => "Valaki", 
            'email' => 'valaki@gmail.com', 
            'password' => Hash::make('aa123'),
            'permission' => 0
        ]);

        User::create([
            'name' => "Valami", 
            'email' => 'valami@gmail.com', 
            'password' => 'aa123'
        ]);

        User::create([
            'name' => "amongus", 
            'email' => 'amongus@susmail.us', 
            'password' => 'ball'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
