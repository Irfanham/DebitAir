<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Stefanus',
            'email' => 'admin@stefanusj.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'User A',
            'email' => 'user@stefanusj.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
