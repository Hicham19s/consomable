<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\R_Produit_DemandePrestation;
use App\Models\Demande;
USE Database\Seeders\ProduitSeeder;
class R_Produit_DemandePrestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        R_Produit_DemandePrestation::factory()->times(count:60)->create();
    }
}
