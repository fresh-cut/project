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
        $item=$this->startConditions();
        $item_count= $item->count();
        $from=rand(1, (($item_count-$count*2)>2000)?2000:($item_count-$count*2));
        return $item
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->limit($count)
            ->offset($from)
            ->toBase()
            ->get();
    }
    public function getCompanyByUrl($region_id, $locality_id, $url)
    {
        return $this->startConditions()
            ->where('companies.region_id', $region_id)
            ->where('companies.locality_id', $locality_id)
            ->where('companies.url', $url)
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
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

    public function getCompaniesByCategory($count=24, $category_id)
    {
        return $this->startConditions()
            ->where('companies.category_id', $category_id)
            ->join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->take($count)
            ->toBase()
            ->get();
    }

    public function getLastCompanies($count=10)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->take($count)
            ->toBase()
            ->get();
    }

    public function findCompanyByUrl($region_id, $locality_id, $company_url)
    {
        return $this->startConditions()
            ->select('companies.id', 'companies.url', 'companies.name', 'locality.url as locality_url', 'region.url as region_url')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->where('companies.url', $company_url)
            ->where('region.id', $region_id)
            ->where('locality.id', $locality_id)
            ->toBase()
            ->get();
    }

    public function findCompanyByName($company_name)
    {
        return $this->startConditions()
            ->select('companies.id', 'companies.url', 'companies.name', 'locality.url as locality_url', 'region.url as region_url')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->where('companies.name','like', '%'.$company_name.'%')
            ->toBase()
            ->get();
    }
}
