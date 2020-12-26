<?php
namespace App\Repositories;

use App\Models\Locality as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class LocalityRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getLocalities($count=48)
    {
        return $this->startConditions()
            ->join('region', 'locality.region_id', '=', 'region.id')
            ->select('locality.*', 'region.url as region_url', 'region.name as region_name')
            ->take($count)
            ->toBase()
            ->get();
    }

    public function getLocalitiesByRegion($count=24, $region_id)
    {
        if($count=='all'){
            return $this->startConditions()
                ->join('region', 'locality.region_id', '=', 'region.id')
                ->where('region_id', $region_id)
                ->select('locality.*', 'region.url as region_url', 'region.name as region_name')
                ->toBase()
                ->get();
        }
        else {
            return $this->startConditions()
                ->join('region', 'locality.region_id', '=', 'region.id')
                ->where('region_id', $region_id)
                ->select('locality.*', 'region.url as region_url', 'region.name as region_name')
                ->take($count)
                ->toBase()
                ->get();
        }

    }
    public function getLocalityByUrl($url)
    {
        return $this->startConditions()
            ->join('region', 'locality.region_id', '=', 'region.id')
            ->select('locality.*', 'region.url as region_url', 'region.name as region_name')
            ->where('locality.url', $url)
            ->toBase()
            ->first();
    }

    public function getLocalityById($id)
    {
        return $this->startConditions()->find($id);
    }
}
