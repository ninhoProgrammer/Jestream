<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Tag;

use function Livewire\store;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // st
        //Storage::makeDirectory('posts');
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        
        
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }

    
}
