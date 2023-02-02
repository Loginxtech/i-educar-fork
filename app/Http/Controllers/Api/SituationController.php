<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ResourceController;

class SituationController extends ResourceController
{

    public function index(): array
    {
        return [
            'data' => [
                9 => 'Exceto Transferidos/Abandono',
                0 => 'Todos',
                1 => 'Aprovado',
                2 => 'Reprovado',
                3 => 'Cursando',
                4 => 'Transferido',
                5 => 'Reclassificado',
                6 => 'Abandono',
                8 => 'Aprovado sem exame',
                10 => 'Aprovado após exame',
                12 => 'Aprovado com dependência',
                13 => 'Aprovado pelo conselho',
                14 => 'Reprovado por falta'
            ]
        ];
    }
}
