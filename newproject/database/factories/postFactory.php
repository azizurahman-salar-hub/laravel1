<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=post::class;
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'sub_title'=>fake()->sentence(),
            'description'=>fake()->paragraph(),
            'slug'=>Str::slug(fake()->sentence())
        ];
    }
}
