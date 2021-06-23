<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categorie;
class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categorie::factory()->times(count:10)->create();
    }
}
