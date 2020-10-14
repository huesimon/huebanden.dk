<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Photo;
use App\Models\PhotoPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhotoPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo_id' => Photo::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
