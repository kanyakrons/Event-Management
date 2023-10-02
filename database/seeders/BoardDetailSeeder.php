<?php

namespace Database\Seeders;

use App\Models\BoardDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BoardDetail::factory(15)->create();
    }
}
