<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Charge;

class ChargeSeeder extends Seeder
{
    public function run(): void
    {
        Charge::factory(100)->create();
    }
}
