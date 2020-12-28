<?php
namespace App\Repositories;

use App\Models\CompaniesAddEdit as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CompanyAddEditRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getCompanies($count=10, $type)
    {
        if($count=='all') {
            return $this->startConditions()
                ->join('category', 'companies_add_edit.category_id', '=', 'category.id')
                ->join('locality', 'companies_add_edit.locality_id', '=', 'locality.id')
                ->join('region', 'companies_add_edit.region_id', '=', 'region.id')
                ->where('type', $type)
                ->orderBy('added', 'desc')
                ->select('companies_add_edit.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
                ->toBase()
                ->get();
        }
        else {
            return $this->startConditions()
                ->join('category', 'companies.category_id', '=', 'category.id')
                ->join('locality', 'companies.locality_id', '=', 'locality.id')
                ->join('region', 'companies.region_id', '=', 'region.id')
                ->select('companies.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
                ->take($count)
                ->toBase()
                ->get();
        }
    }

    public function getCompanyById($id)
    {
        return $this->startConditions()
            ->join('category', 'companies_add_edit.category_id', '=', 'category.id')
            ->join('locality', 'companies_add_edit.locality_id', '=', 'locality.id')
            ->join('region', 'companies_add_edit.region_id', '=', 'region.id')
            ->where('companies_add_edit.id', $id)
            ->select('companies_add_edit.*', 'category.url as category_url', 'category.name as category_name', 'locality.url as locality_url', 'locality.name as locality_name', 'region.url as region_url', 'region.name as region_name')
            ->toBase()
            ->first();
    }
}
