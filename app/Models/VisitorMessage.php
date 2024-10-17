<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorMessage extends Model
{
    use HasFactory;
    protected $fillable =[
        'visitor_name',
        'visitor_email',
        'visitor_message'
    ];
}
