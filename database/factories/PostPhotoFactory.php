<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Photo;
use App\Models\PostPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'photo_id' => Photo::factory()
        ];
    }
}
