<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // DB::table('users')->insert([
        //     'name' => env('ADMIN_NAME'),
        //     'email' => env('ADMIN_EMAIL'),
        //     'password' => bcrypt(env('ADMIN_PASSWORD')),
        //     'role_id' => '1'
        // ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
            'role_id' => '1',
            'pin' => '0'
        ]);
    }
}
