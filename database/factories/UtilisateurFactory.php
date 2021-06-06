<?php

namespace Database\Factories;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Utilisateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'pseudo'=>$this->faker->unique()->word(),
                'nom' =>$this->faker->word() ,
                'prenom' =>$this->faker->word() ,
                //'nomservice'=>$this->"SAG",
                //'activation'=>$this->,                
                'password'=>$this->faker->word(),
        ];
    }
}
