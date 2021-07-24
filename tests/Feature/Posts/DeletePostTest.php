<?php

namespace Tests\Feature\Posts;

use App\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**    
     * @test
     */
    public function an_authenticated_user_can_delete_a_post()
    {
        // $this->withoutExceptionHandling();

        $user = create(User::class);
        
        $post = create(Post::class, ['author_id' => $user->id]);
        $newPost = [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'author_id' => $user->id,
        ];

        $this->assertDatabaseHas('posts', $newPost);

        $response =  $this->deleteJson($this->baseUrl . "posts/{$post->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('posts', $newPost);

        $this->assertNull(Post::find($post->id));
    }
}
