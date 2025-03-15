<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'ks_jobs';
    protected $fillable = [
    'company_name',
    'summary',
    'job_title',
    'company_image',
    'description' ,
    'requirement' ,
    'location',
    'deadline',
    'vacancy',
    'exp_min' ,
    'exp_max',
    'role' ,
    'industry_type' ,
    'employment_type' ,
    'salary_min',
    'salary_max',
    'key_skills'];


    public function users()
    {
        return $this->belongsToMany('App\User', 'jobs_user', 'jobs_id', 'id');
    }


}
