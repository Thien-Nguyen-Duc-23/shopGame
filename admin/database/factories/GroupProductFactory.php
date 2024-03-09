<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\GroupProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupProduct>
 */
class GroupProductFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = GroupProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'library_id' => null, 
            'name' => fake()->name(), 
            'description' => fake()->text(200)
        ];
    }
}
