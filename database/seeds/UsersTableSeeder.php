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
        DB::table('users')->insert([
            ['name' => 'chikaldirick', 'email' => 'chikaldirick@gmail.com', 'password' => '$2y$10$xJeRfCcNj9QrqMS2WnpoH.DMd.lhyUqlViEcquk9PT1ZZT2FNu9wa', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],

        ]);
    }
}
