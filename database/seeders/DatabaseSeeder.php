<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Teams
        $teams = [
            ['name' => 'IT', 'description' => 'Tim Information Technology'],
            ['name' => 'Keuangan', 'description' => 'Tim Keuangan'],
            ['name' => 'SDM', 'description' => 'Tim Sumber Daya Manusia'],
            ['name' => 'Hukum', 'description' => 'Tim Legal & Hukum'],
            ['name' => 'Umum', 'description' => 'Tim Bagian Umum'],
        ];

        foreach ($teams as $team) {
            \App\Models\Team::create($team);
        }

        // Users
        User::create([
            'name' => 'Admin System',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Sekretaris',
            'email' => 'sekretaris@test.com',
            'password' => bcrypt('password'),
            'role' => 'sekretaris',
        ]);

        User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@test.com',
            'password' => bcrypt('password'),
            'role' => 'pimpinan',
        ]);

        User::create([
            'name' => 'Ketua Tim IT',
            'email' => 'ketua_it@test.com',
            'password' => bcrypt('password'),
            'role' => 'ketua_tim',
            'team_id' => 1,
        ]);
        
        User::create([
            'name' => 'Ketua Tim Keuangan',
            'email' => 'ketua_keuangan@test.com',
            'password' => bcrypt('password'),
            'role' => 'ketua_tim',
            'team_id' => 2,
        ]);
    }
}
