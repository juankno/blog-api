<?php

namespace Tests\Feature\Posts;

use App\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**    
     * @test
     */
    public function an_authenticated_user_can_create_a_post()
    {
        // $this->withoutExceptionHandling();

        $user = create(User::class);

        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbCharts = 40),
            'author_id' => $user->id
        ];

        $response = $this->postJson($this->baseUrl . 'posts', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', $data);

        $post = Post::first();

        $response->assertJson([
            'type' => $post->getTable(),
            'id' => $post->id,
            "attributes" => [
                'title' =>  $post->title,
                'content' => $post->content,
            ],
            "links" => [
                'self' => route('posts.show', ['post' => $post->id])
            ]
        ]);
    }
}
