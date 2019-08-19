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
        // $this->call(UsersTableSeeder::class);
        // 25.1 Create the User seeder:
            factory(App\User::class, 5)->create();
        // 6.1 Create the Products & Reviews seeder:
            factory(App\Model\Product::class, 50)->create();
            factory(App\Model\Review::class, 300)->create();
    }
}
