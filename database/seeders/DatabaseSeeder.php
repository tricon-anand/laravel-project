<?php

use App\Models\Trade;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([      // <-- note "$user =" at the start
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Trade::factory(10)->for($user)->create();
    }
}
