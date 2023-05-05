<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = [
            [
               'role_id'=>'1',
               'first_name'=>'Admin',
               'last_name'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'role_id'=>'2',
               'first_name'=>'Vendor',
               'last_name'=>'Vendor',
               'email'=>'vendor@gmail.com',
                'password'=> bcrypt('123456'),
            ],
            [
               'role_id'=>'3',
               'first_name'=>'User',
               'last_name'=>'User',
               'email'=>'user@gmail.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'role_id'=>'4',
               'first_name'=>'Driver',
               'last_name'=>'Driver',
               'email'=>'driver@gmail.com',
               'password'=> bcrypt('123456'),
            ],


        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
