<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyProject extends Model
{
    use HasFactory;
    protected $fillable =[
        'project_name' ,
        'project_link' ,
        'project_image'
    ];
}
