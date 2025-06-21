<?php

use App\Models\Poli;
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
        Schema::table('users', function (Blueprint $table) {
            // Remove the old 'poli' column
            $table->dropColumn('poli');
            $table->foreignIdFor(Poli::class)
                ->nullable()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('poli')->nullable();
        });
    }
};
