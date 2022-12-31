<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
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
            'prov_address' => $this->faker->randomElement([
                'Balayhangin', 'Bangyas', 'Dayap', 'Hanggan', 'Imok', 'Lamot 1', 'Lamot 2',
                'Limao', 'Mabacan', 'Masiit', 'Paliparan', 'Perez', 'Kanluran', 'Silangan',
                'Prinza', 'San Isidro', 'Santo Tomas'
            ]),
            'contact_number' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'email' => $this->faker->email,
            'facebook' => $this->faker->name,
            'birthplace' => $this->faker->randomElement([
                'Balayhangin', 'Bangyas', 'Dayap', 'Hanggan', 'Imok', 'Lamot 1', 'Lamot 2',
                'Limao', 'Mabacan', 'Masiit', 'Paliparan', 'Perez', 'Kanluran', 'Silangan',
                'Prinza', 'San Isidro', 'Santo Tomas'
            ]),
            'religion' => $this->faker->randomElement([
                'Roman Catholic', 'Born Again Christian', 'Iglesia ni Cristo', 'Jehovah\'s Witness',
                'Seventh Day Adventists'
            ]),
            'sss' => $this->faker->randomNumber(5, true),
            'tin' => $this->faker->randomNumber(5, true),
            'education' => $this->faker->randomElement([
                'Elementary', 'High School', 'College', 'N/A'
            ]),
            'skills' => $this->faker->word(),
            'employment' => $this->faker->word(),
            'income' => $this->faker->numberBetween(300, 100000),
        ];
    }
}
