<?php
namespace App\Repositories;

use App\Models\Company as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CompanyRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getCompanies($count=10)
    {
        return $this->startConditions()
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->take($count)
            ->toBase()
            ->get();
    }
    public function getCompanyIdByUrl($region_id, $locality_id, $url)
    {
        return $this->startConditions()
            ->where('region_id', $region_id)
            ->where('locality_id', $locality_id)
            ->where('url', $url)
            ->select('id')
            ->toBase()
            ->first();
    }

    public function getCompanyById($id)
    {
        return $this->startConditions()
            ->where('companies.id', $id)
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->toBase()
            ->first();
    }

    public function getCompaniesByRegion($count=10, $region_id)
    {
        return $this->startConditions()
            ->where('companies.region_id', $region_id)
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->take($count)
            ->toBase()
            ->get();
    }
    public function getCompaniesByCity($count=10, $city_id)
    {
        return $this->startConditions()
            ->where('companies.locality_id', $city_id)
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->take($count)
            ->toBase()
            ->get();
    }

}
