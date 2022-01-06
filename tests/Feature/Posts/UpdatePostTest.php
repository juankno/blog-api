<?php

namespace Tests\Feature\Posts;

use App\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**    
     * @test
     */
    public function an_authenticated_user_can_update_a_post()
    {
        // $this->withoutExceptionHandling();

        $user = create(User::class);

        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbCharts = 40),
        ];

        $post = create(Post::class);

        $response = $this->putJson($this->baseUrl . "posts/{$post->id}", $data);
        $response->assertStatus(200);

        $post = $post->fresh();

        $this->assertEquals($post->title, $data['title']);
        $this->assertEquals($post->content, $data['content']);
    }
}
