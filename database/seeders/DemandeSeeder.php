<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Demande;

class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Demande::factory()->count(20)->create();
    }
}
