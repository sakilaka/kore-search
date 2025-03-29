<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vacancy',
        'salary',
        'experience',
        'type',
        'location',
        'deadline',
        'skill',
        'description',
        'overview',
        'key_responsibilities',
        'qualification',
        'nice_to_have',
        'soft_skill'
    ];
}
