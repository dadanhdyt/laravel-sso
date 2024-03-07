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
        Schema::create('auth_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppClient::class)->constrained('app_clients','id')->restrictOnDelete()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained('users','id')->restrictOnDelete()->cascadeOnDelete();
            $table->string('expired');
            $table->uuid('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_codes');
    }
};
