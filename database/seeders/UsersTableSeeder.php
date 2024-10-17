<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mona Saleh',
            'email' => 'mona@gmail.com',
            'password' => Hash::make('12345678'),
            'Job_Title' => 'Front-end&Back-end Developer',
            'file_of_cv' => 'https://drive.google.com/file/d/1efz6W36PknW6kWn4teXVvCNuTWBFggbT/view?usp=drivesdk',
            'Location' => 'Syria/Rif-Damascus/Judaydat Artuz',
            'facebook_link' => 'https://www.facebook.com/monaali.saleh.79?mibextid=ZbWKwL',
            'github_link' => 'https://github.com/eng-MonaSaleh18',
            'telegram_number' => '+963959929155',
            'phone' => '+963959929155'
        ]);
    }
}
