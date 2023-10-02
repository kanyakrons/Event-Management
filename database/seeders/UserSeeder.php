<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->user_name = 'somchai';
        $user->first_name = 'Somchai';
        $user->last_name = 'Jingjai';
        $user->role ='MEMBER';
        $user->age =20;
        $user->email = 'somchai@gmail.com';
        $user->email_verified_at = now();
        $user->password = 'somchaipassword'; // password
        $user->remember_token = Str::random(10);
        $user->save();


        $user = new User();
        $user->user_name = 'rose';
        $user->first_name = 'Roserin';
        $user->last_name = 'Sukjai';
        $user->role ='OFFICER';
        $user->age =30;
        $user->email = 'rose@gmail.com';
        $user->email_verified_at = now();
        $user->password = 'roserinpassword'; // password
        $user->remember_token = Str::random(10);
        $user->save();


    }
}
