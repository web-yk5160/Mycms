<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->delete();

        if (env('APP_ENV') === 'local')
        {
            $faker = \Faker\Factory::create();

            DB::table('users')->insert([
                [
                    'name' => 'test',
                    'slug' => 'test',
                    'email' => 'test@test.com',
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => 'test2',
                    'slug' => 'test2',
                    'email' => 'test2@test.com',
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => 'test3',
                    'slug' => 'test3',
                    'email' => 'test3@test.com',
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
            ]);
        }
        else
        {
            DB::table('users')->insert([
                [
                    'name' => 'test',
                    'slug' => 'test',
                    'email' => 'test@test.com',
                    'password' => bcrypt('secret'),
                    'bio' => "test account"
                ]
            ]);
        }
    }
}
