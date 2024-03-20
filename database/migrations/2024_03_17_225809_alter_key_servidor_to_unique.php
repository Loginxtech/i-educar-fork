<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pmieducar.servidor', function (Blueprint $table) {
            $table->unique('cod_servidor', 'pmieducar_servidor_cod_servidor_unique');
        });
    }

    public function down(): void
    {
        Schema::table('pmieducar.servidor', function (Blueprint $table) {
            $table->dropUnique('pmieducar_servidor_cod_servidor_unique');
        });
    }
};
