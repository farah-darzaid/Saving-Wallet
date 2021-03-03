<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => 'user',
                'email' => 'user@localhost.com',
                'phone' => '0790799797',
                'birthday' => '12-12-2020',
                'password' => Hash::make('user12345'),
                'avatar' => 'uploads/9rBkrjMQ4c5iXoQkrX881yyMYQ9oQ6WUCUxVhBqr.png',
                'role' => 'user',
                'created_at' => '2021-03-02 20:02:04'

            ],
            [
                'name' => 'admin',
                'email' => 'admin@localhost.com',
                'phone' => '0780788787',
                'birthday' => '1-1-2020',
                'password' => Hash::make('admin12345'),
                'avatar' => 'uploads/9rBkrjMQ4c5iXoQkrX881yyMYQ9oQ6WUCUxVhBqr.png',
                'role' => 'admin',
                'created_at' => '2021-03-02 20:02:04'

            ]
        ]);
    }
}
