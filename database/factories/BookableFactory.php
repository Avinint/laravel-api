<?php

namespace Database\Factories;

use App\Models\Bookable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookableFactory extends Factory
{
    private $suffix = [
        'Villa',
        'House',
        'Cottage',
        'Luxury Villa',
        'Cheap House',
        'Luxury Rooms',
        'Fancy Rooms'
    ];


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookable::class;

    /**
     * Define the model's default state.
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city. ' '. Arr::random($this->suffix),
            'description' => $this->faker->text(),
            'price' => random_int(15, 600)
        ];
    }
}
