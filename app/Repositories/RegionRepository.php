<?php
namespace App\Repositories;

use App\Models\Region as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RegionRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getRegions($count=48)
    {
        if($count==='all') {
            return $this->startConditions()
                ->toBase()
                ->get();
        }
        else {
            return $this->startConditions()
                ->inRandomOrder()
                ->take($count)
                ->toBase()
                ->get();
        }
    }

    public function getRegionByUrl($url)
    {
        return $this->startConditions()
            ->where('url', $url)
            ->toBase()
            ->first();
    }

    public function getRegionById($id)
    {
        return $this->startConditions()->find($id);
    }
}
