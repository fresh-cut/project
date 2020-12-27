<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    // только эти столбцы при массовом сохранении
    protected $fillable = ['company_id', 'name', 'email', 'review', 'added', 'ip', 'status'];
    public $timestamps = false;
}
