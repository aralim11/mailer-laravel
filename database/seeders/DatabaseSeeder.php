<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Comments::create([
            'body' => 'In 2011 when mobile financial service (MFS) was introduced in   Bangladesh, 27 banks took the approval from the central bank as many had correctly predicted an impending boom',
            'user_id' => 1,
        ]);
    }
}
