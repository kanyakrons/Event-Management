<?php

namespace Database\Seeders;

use App\Models\OrganizerMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizerMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrganizerMember::factory(40)->create();
    }
}
