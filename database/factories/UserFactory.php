<?php

namespace Database\Factories;

use App\Models\Bagian;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public $number = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $max_bagian = count(Bagian::where('jabatan_id', '<>', 8)->get());
        $op_id = Bagian::where('jabatan_id', 1)->first()->id;
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'npk' => $this->faker->unique()->numberBetween(100000, 999999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'bagian_id' => $this->number++ <= $max_bagian ? $this->number : $this->faker->numberBetween($op_id, $max_bagian),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
