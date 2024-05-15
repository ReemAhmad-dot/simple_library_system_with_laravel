<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   $this->call([
        UserRolePermissionSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //\App\Models\Category::factory(20)->hasBooks(rand(0,3))->create();
        $categories=\App\Models\Category::factory(20)
                    ->create()
                    ->each(function ($category) {
                        $category->books()->saveMany(\App\Models\Book::factory(rand(0,3))->make());
    });
        \App\Models\Book::factory(30)->create();
    }
}
