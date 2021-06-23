<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(class:CategorieSeeder::class);
        //$this->call(class:UtilisateurSeeder::class);
        //$this->call(class:DemandeSeeder::class);
        $this->call(class:R_Produit_DemandePrestationSeeder::class);

    }
}
