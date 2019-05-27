<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'System Bot',
            'group' => 'Administrator',
            'email' => 'no-reply@noreply.com',
            'password' => Hash::make('password'),
            'administrator' => true
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Liesel Downes',
            'alias' => 'Liesel',
            'form' => 'SS07',
            'group' => 'Administrator',
            'email' => 'lieselta@gmail.com',
            'password' => Hash::make('password'),
            'administrator' => true
        ]);
    }
}
