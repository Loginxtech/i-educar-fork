<?php

use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    public function up()
    {
        DB::unprepared('DROP TABLE IF EXISTS pmieducar.servidor_titulo_concurso;');
    }
};
