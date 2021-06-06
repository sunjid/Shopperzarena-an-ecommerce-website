<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'sunjid',
            'email' => 'sarwarsunjid@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
