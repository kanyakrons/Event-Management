<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SubdistrictSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(OrganizerSeeder::class);
        $this->call(OrganizerMemberSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(BudgetSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(TeamMemberSeeder::class);
        $this->call(BoardSeeder::class);
        $this->call(BoardDetailSeeder::class);
    }
}
