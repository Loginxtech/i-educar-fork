<?php

namespace App\Services\Atrib;

use App\Repositories\Atrib\SpecialNecessitiesRepository;
use Illuminate\Support\Collection;

class SpecialNecessitiesService
{
    public function getRecentStudentsData(int $schoolCode, string $serie): Collection
    {
        $repository = new SpecialNecessitiesRepository();

        try {
            return $repository($schoolCode, $serie);
        } catch (\Throwable $th) {
            return collect(["error" => $th->getMessage()]);
        }
    }
}
