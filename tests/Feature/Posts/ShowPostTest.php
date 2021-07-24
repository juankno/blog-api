<?php

namespace Tests\Feature\Posts;

use App\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    use RefreshDatabase;

    /**    
     * @test
     */
    public function an_authenticated_user_can_see_a_post()
    {
        $user = create(User::class);

        $post = create(Post::class, ['author_id' => $user->id]);

        $response = $this->getJson($this->baseUrl . "posts/{$post->id}");
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'author_id' => $user->id,
            ]
        ]);
    }
}
