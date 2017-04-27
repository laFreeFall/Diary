<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 50)->create()->each(function ($u) {
//            $u->notes()->save(factory(App\Note::class)->make());
//        });

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
    }
}
