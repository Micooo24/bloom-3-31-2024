<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factor>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productImageDirectory = public_path('product_image');
        $productImages = scandir($productImageDirectory);
        
        // Remove . and .. from the list
        $productImages = array_diff($productImages, array('.', '..'));
        
        // Reset array keys to ensure proper indexing
        $productImages = array_values($productImages);
        
        return [
            'product_name' => $this->faker->name,
            'product_description' => $this->faker->text,
            'product_image' => $this->faker->randomElement($productImages),
            'product_price' => $this->faker->randomFloat(2, 0, 100),
            'created_at' =>   Carbon::now()->toDateTimeString(),
            'updated_at' =>  Carbon::now()->toDateTimeString(),
        ];
    }
}
