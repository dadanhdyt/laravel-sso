<?php

use App\Models\AppClient;
use App\Models\User;
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
        Schema::create('akses_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('akses_token')->unique();
            $table->foreignIdFor(User::class)->constrained('users','id')->restrictOnDelete()->cascadeOnDelete();
            $table->foreignIdFor(AppClient::class)->constrained('app_clients','id')->restrictOnDelete()->cascadeOnDelete();
            $table->string('expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_tokens');
    }
};
