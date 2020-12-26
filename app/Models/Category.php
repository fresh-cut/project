<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = ['_method', '_token']; // игнорировать при массовом сохранении
    public $timestamps = false;
}
