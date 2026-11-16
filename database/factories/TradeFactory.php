<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Trade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trade>
 */
class TradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $entry = fake()->randomFloat(2, 100, 5000);
        return [
            'user_id' => User::factory(),
            'symbol' => fake()->randomElement(['RELIANCE', 'TCS', 'INFY', 'HDFCBANK', 'SBIN', 'ITC']),
            'side' => fake()->randomElement(['BUY', 'SELL']),
            'qty' => fake()->numberBetween(1, 100),
            'entry_price' => $entry,
            'exit_price' => round($entry * fake()->randomFloat(2, 0.95, 1.06), 2),
            'traded_on' => fake()->dateTimeBetween('-60 days', 'now'),
        ];
    }
}
