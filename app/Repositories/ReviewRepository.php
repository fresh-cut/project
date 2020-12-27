<?php
namespace App\Repositories;

use App\Models\Review as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ReviewRepository extends CoreRepository
{
    public function getModelClass()
    {
        return Model::class;
    }

    public function getReviewsByCompanyId($companyId)
    {
        return $this->startConditions()
        ->join('companies', 'review.company_id', '=', 'companies.id')
        ->join('region', 'companies.region_id', '=', 'region.id')
        ->join('locality', 'companies.locality_id', '=', 'locality.id')
        ->select('review.id as reviewer_id','review.name as reviewer_name', 'review.email as reviewer_email', 'review.review as review_comment',
            'review.added as review_data', 'region.url as region_url', 'region.name as region_name',
            'locality.url as locality_url', 'locality.name as locality_name', 'companies.*')
        ->where('company_id', $companyId)
        ->where('status', 1)
        ->orderBy('review.id','desc')
        ->toBase()
        ->get();
    }

    public function getReviews($count=3)
    {
        if($count=='all'){
            return $this->startConditions()
                ->join('companies', 'review.company_id', '=', 'companies.id')
                ->join('region', 'companies.region_id', '=', 'region.id')
                ->join('locality', 'companies.locality_id', '=', 'locality.id')
                ->select('review.id as review_id','review.name as reviewer_name', 'review.email as reviewer_email', 'review.review as review_comment',
                    'review.added as review_data', 'review.status as review_status', 'review.ip as reviewer_ip', 'region.url as region_url', 'region.name as region_name',
                    'locality.url as locality_url', 'locality.name as locality_name', 'companies.*')
                ->orderBy('review.id','desc')
                ->toBase()
                ->get();
        }
        else {
            return $this->startConditions()
                ->join('companies', 'review.company_id', '=', 'companies.id')
                ->join('region', 'companies.region_id', '=', 'region.id')
                ->join('locality', 'companies.locality_id', '=', 'locality.id')
                ->select('review.id as reviewer_id','review.name as reviewer_name', 'review.email as reviewer_email', 'review.review as review_comment',
                    'review.added as review_data', 'region.url as region_url', 'region.name as region_name',
                    'locality.url as locality_url', 'locality.name as locality_name', 'companies.*')
                ->where('status', 1)
                ->take($count)
                ->orderBy('review.id','desc')
                ->toBase()
                ->get();
        }
    }

    public function getReviewById($id)
    {
        return $this->startConditions()
            ->join('companies', 'review.company_id', '=', 'companies.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->select('review.id as review_id','review.name as reviewer_name', 'review.email as reviewer_email', 'review.review as review_comment',
                'review.added as review_data','review.status as review_status', 'review.ip as reviewer_ip', 'region.url as region_url', 'region.name as region_name',
                'locality.url as locality_url', 'locality.name as locality_name', 'companies.*')
            ->where('review.id', $id)
            ->first();
    }
}
