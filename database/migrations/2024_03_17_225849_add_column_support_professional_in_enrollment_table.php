<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pmieducar.matricula_turma', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_profissional_apoio')->nullable();
            $table->foreign('cod_profissional_apoio')->references('cod_servidor')->on('pmieducar.servidor');
        });
    }

    public function down(): void
    {
        Schema::table('pmieducar.matricula_turma', function (Blueprint $table) {
            $table->dropForeign(['cod_profissional_apoio']);
            $table->dropColumn('cod_profissional_apoio');
        });
    }
};
