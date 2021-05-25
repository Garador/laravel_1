<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = \App\Models\User::first();
        return [
            "title" => $this->faker->sentence(8),
            "body" => $this->faker->realTextBetween(400, 800),
            "poster_id" => $user->id
        ];
    }

    /**
     * Imports the records from the endpont and adds them to the page.
     */
    public static function getFromEndpoint(){
        $ENDPOINT = env('POSTS_IMPORT_ENDPOINT', 'https://sq1-api-test.herokuapp.com/posts');
        $json = file_get_contents($ENDPOINT);
        $data = json_decode($json)->data;
        return $data;
    }
}
