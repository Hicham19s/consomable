<?php

namespace Database\Factories;
use App\Models\categorie;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
                'designation'=>$this->faker->unique()->word(),
                'qtestock' =>$this->faker->numberBetween(10,100) ,
                'categorie_id' =>categorie::factory() ,
        ];
    }
}
