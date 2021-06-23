<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::factory()->times(count:15)->create();

    }
}
