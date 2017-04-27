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
            ['name' => 'user01', 'email' => 'user01@mail.com', 'password' => bcrypt('user01'), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'user02', 'email' => 'user02@mail.com', 'password' => bcrypt('user02'), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'user03', 'email' => 'user03@mail.com', 'password' => bcrypt('user03'), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'user04', 'email' => 'user04@mail.com', 'password' => bcrypt('user04'), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['name' => 'user05', 'email' => 'user05@mail.com', 'password' => bcrypt('user05'), 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],

        ]);
    }
}
