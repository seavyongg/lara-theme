<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        // Create 12 services with specific data
        Service::factory()
            ->count(12)
            ->withSpecificData()
            ->create();
    }
}
