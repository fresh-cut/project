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
                ->where('type', $type)
                ->orderBy('added', 'desc')
                ->toBase()
                ->get();
        }
        else {
            return $this->startConditions()
                ->take($count)
                ->toBase()
                ->get();
        }
    }

    public function getCompanyById($id)
    {
        return $this->startConditions()
            ->where('companies_add_edit.id', $id)
            ->toBase()
            ->first();
    }
}
