<?php

use Illuminate\Database\Seeder;
use App\models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ];
        if(!User::where('email',$adminUser['email'])->exists()) {
            User::create($adminUser);
        }
    }
}
