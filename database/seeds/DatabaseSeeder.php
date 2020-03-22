<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
//        Schema::disableForeignKeyConstraints();

        DB::table('articles')->truncate();
//        DB::table('categories')->truncate();
        DB::table('users')->truncate();

        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
