<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_retrieve_posts()
    {
        $this->actingAs($user = User::factory()->create(), 'api');
        $posts = Post::factory(2)->create();

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->first()->id,
                            'attributes' => [
                                'title' => $posts->first()->title,
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->last()->id,
                            'attributes' => [
                                'title' => $posts->last()->title,
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/posts')
                ]
            ]);
    }
}
