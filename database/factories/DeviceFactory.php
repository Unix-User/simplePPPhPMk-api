<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'ip' => $this->faker->ipv4(),
            'user_id' => $this->faker->digits(1),
            'ikev2' => $this->faker->boolean,
            'user' => $this->faker->word,
            'password' => $this->faker->word
        ];
    }
}
