<?php

namespace Database\Factories;

use App\Models\CustomerMysql;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerMysqlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerMysql::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
        ];
    }
}
