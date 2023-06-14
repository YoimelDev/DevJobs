<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $casts = [ 'last_day'=>'date'];

    protected $fillable = [
        'title',
        'category_id',
        'salary_id',
        'company',
        'last_day',
        'job_description',
        'image',
        'user_id'
    ];
}
