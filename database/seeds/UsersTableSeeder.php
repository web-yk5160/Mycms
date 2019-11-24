<?php

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'test',
                'slug' => 'test',
                'email' => 'test@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'test2',
                'slug' => 'test2',
                'email' => 'test2@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'test3',
                'slug' => 'test3',
                'email' => 'test3@test.com',
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
