<?php

namespace Database\Factories;
use App\Models\Produit;
use App\Models\Utilisateur;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demande::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'etat_traitement'=>$this->faker->randomElement($array = array('','acceptée','validée','refusée','en_attente')),
                'utilisateur_id' =>Utilisateur::factory(),
        ];
    }
}
