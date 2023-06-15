<?php

namespace App\Models;

use App\Models\Salary;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function salary(){
        return $this->belongsTo(Salary::class);
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    // Saber si el usuario aplico a la vacante
    public function userApplied(){
        return $this->candidates->contains('user_id', auth()->user()->id);
    }
}
