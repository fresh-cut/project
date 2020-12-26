<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;
    protected $table = 'locality';
    protected $guarded = ['_method', '_token']; // игнорировать при массовом сохранении
    public $timestamps = false;
}
