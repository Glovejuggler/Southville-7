<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->randomElement([
                'Balayhangin', 'Bangyas', 'Dayap', 'Hanggan', 'Imok', 'Lamot 1', 'Lamot 2',
                'Limao', 'Mabacan', 'Masiit', 'Paliparan', 'Perez', 'Kanluran', 'Silangan',
                'Prinza', 'San Isidro', 'Santo Tomas'
            ]),
            'contact_number' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
