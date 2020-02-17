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
        DB::table('users')->insert([
            'name' => 'Paulo Henrique',
            'email' => 'ph@web.com',
            'password' => bcrypt('123'),
            'cpf' => '123.456.789-10'
        ]);

        for($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt(Str::random(3)),
                'cpf' => '123.456.789-10'
            ]);
        }
    }
}
