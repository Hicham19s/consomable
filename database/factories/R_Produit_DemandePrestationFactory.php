<?php

namespace Database\Factories;

use App\Models\R_Produit_DemandePrestation;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;
use App\Models\Demande;
class R_Produit_DemandePrestationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = R_Produit_DemandePrestation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'qtedemandee'=>$this->faker->numberBetween(10,100),
                'qteprise' =>$this->faker->numberBetween(10,100) ,
                'produit_id' =>Produit::factory(),
                'demande_id' =>Demande::factory(), 
        ];
    }
}
