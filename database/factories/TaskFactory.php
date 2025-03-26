<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_cong_viec' => $this->faker->name(),
            'trang_thai' => $this->faker->numberBetween(0, 2),
            'ngay_het_han' => $this->faker->dateTimeBetween('now', '+1 months'),
            'nguoi_phan_cong_id' => $this->faker->numberBetween(1, 20),
            'nguoi_lam_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
