<?php

namespace Database\Seeders;

use App\Models\Check;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ali Dakheel',
            'email' => 'ali.dakheel@raincode.tech',
        ]);

        $service = Service::factory()->for($user)->create([
            'name' => 'Trebelle api',
            'url' => 'http://trebelle-api.com',
        ]);

        Check::factory()->for($service)->count(10)->create();
    }
}
