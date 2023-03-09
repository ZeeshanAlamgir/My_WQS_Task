<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CVBuilder extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'c_v_builders';
    public $fillable = [
        'work_experience',
        'education',
        'skills',
        'other_info',
        'user_id'
    ]; 
    
}
