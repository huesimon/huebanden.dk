<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image();
        // $imageFile = new File($image);
        return [
            'user_id' => User::factory(),
            'path' => Storage::putFile('photos', new File($image)),
        ];
    }
}
