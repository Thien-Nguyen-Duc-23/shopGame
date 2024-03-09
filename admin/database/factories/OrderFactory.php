<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => null, 
            'user_id' => null, 
            'product_id' => null, 
            'unit_price' => fake()->numberBetween(100000, 10000000), 
            'total' => fake()->numberBetween(100000, 10000000), 
            'quantity' => fake()->numberBetween(1, 100), 
            'discouted' => fake()->numberBetween(1, 100), 
            'partner_rate' => fake()->numberBetween(1, 100), 
            'received_at' => Carbon::now(), 
            'completed_at' => null, 
            'processor_id' => null,
            'library_id' => null, 
            'buyer_note' => fake()->text(200), 
            'admin_note' => fake()->text(200), 
            'banking_code' => fake()->text(30), 
            'status' => random_int(1, 3)
        ];
    }
}
