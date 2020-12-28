<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    public $timestamps = false;
    protected $guarded = ['_method', '_token']; // игнорировать при массовом сохранении
}
