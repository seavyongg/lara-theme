<?php

// database/factories/ServiceFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->words(2, true),
            'color' => $this->faker->hexColor(),
            'image' => 'bi-' . $this->faker->word(),
            'order' => $this->faker->unique()->numberBetween(1, 100)
        ];
    }

    public function withSpecificData()
    {
        $data = [
            ['title' => 'Lorem Ipsum', 'color' => '#ffbb2c', 'image' => 'bi-eye'],
            ['title' => 'Dolor Sitema', 'color' => '#5578ff', 'image' => 'bi-infinity'],
            ['title' => 'Sed perspiciatis', 'color' => '#e80368', 'image' => 'bi-mortarboard'],
            ['title' => 'Magni Dolores', 'color' => '#e361ff', 'image' => 'bi-nut'],
            ['title' => 'Nemo Enim', 'color' => '#47aeff', 'image' => 'bi-shuffle'],
            ['title' => 'Eiusmod Tempor', 'color' => '#ffa76e', 'image' => 'bi-star'],
            ['title' => 'Midela Teren', 'color' => '#11dbcf', 'image' => 'bi-x-diamond'],
            ['title' => 'Pira Neve', 'color' => '#4233ff', 'image' => 'bi-camera-video'],
            ['title' => 'Dirada Pack', 'color' => '#b2904f', 'image' => 'bi-command'],
            ['title' => 'Moton Ideal', 'color' => '#b20969', 'image' => 'bi-dribbble'],
            ['title' => 'Verdo Park', 'color' => '#ff5828', 'image' => 'bi-activity'],
            ['title' => 'Flavor Nivelanda', 'color' => '#29cc61', 'image' => 'bi-brightness-high']
        ];

        return $this->state(function (array $attributes) use ($data) {
            static $order = 1;
            $item = $this->faker->unique()->randomElement($data);
            $item['order'] = $order++;
            return $item;
        });
    }
}
