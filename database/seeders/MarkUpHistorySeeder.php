<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarkUpHistory;

class MarkUpHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 10 fake MarkUpHistory records
        MarkUpHistory::factory()->count(10)->create();
    }
}
