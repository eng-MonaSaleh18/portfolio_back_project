<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory , Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'telegram_number',
        'github_link',
        'facebook_link',
        'file_of_cv',
        'Location',
        'Job_Title',
    ];
}
