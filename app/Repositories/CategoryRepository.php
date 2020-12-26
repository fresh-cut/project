<?php
namespace App\Repositories;

use App\Models\Category as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getIdByUrl($url)
    {
        return $this->startConditions()
            ->select('id')
            ->where('url', $url)
            ->toBase()
            ->first();
    }

    public function getCategories($count='all')
    {
        return $this->startConditions()
            ->toBase()
            ->get();
    }

    public function getCategoryById($id)
    {
        return $this->startConditions()->find($id);
    }
}
