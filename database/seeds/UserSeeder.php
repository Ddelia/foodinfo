<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPassword = Hash::make('parola12');

        $users = [
            ['name' => 'Delia', 'email' => 'delia@yahoo.com', 'role' => 'admin']
        ];

        foreach($users as $single_user){

            $check = User::where('email', $single_user['email'])->first();

            if($check === null){
                $user = User::create([
                    'name' => $single_user['name'],
                    'email' => $single_user['email'],
                    'password' => $defaultPassword,
                ]);

                $user->assignRole($single_user['role']);
            }
        }
    }
}
