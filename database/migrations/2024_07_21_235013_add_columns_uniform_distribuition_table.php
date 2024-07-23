<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('public.uniform_distributions', function (Blueprint $table) {
            $table->boolean('winter_kit')->default(false);
            $table->boolean('summer_kit')->default(false);
            $table->char('kit_size', length: 5)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('public.uniform_distributions', function (Blueprint $table) {
            $table->dropColumn(['winter_kit', 'summer_kit', 'kit_size']);
        });
    }
};
