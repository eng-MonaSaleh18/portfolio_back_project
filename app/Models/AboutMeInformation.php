<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMeInformation extends Model
{
    use HasFactory;
    protected $fillable =[
        'about_me',
        'what_i_do'
    ];
}
