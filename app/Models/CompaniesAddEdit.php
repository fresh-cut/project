<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesAddEdit extends Model
{
    use HasFactory;
    protected $table = 'companies_add_edit';
    public $timestamps = false;
    protected $guarded = ['_method', '_token']; // игнорировать при массовом сохранении
}
