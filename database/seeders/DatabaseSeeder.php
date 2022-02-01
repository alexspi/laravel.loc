<?php
namespace Database\Seeders;

use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DummyDataSeeder;
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
        $this->call([
            DummyDataSeeder::class
//            RoleSeeder::class,
//            PermissionSeeder::class,
//            UserSeeder::class,
//            RolePermissionSeeder::class,
        ]);
    }
}
