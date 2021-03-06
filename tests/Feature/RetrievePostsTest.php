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
        $this->withoutExceptionHandling();
                
        $this->actingAs($user = User::factory()->create(), 'api');
        $anotherUser = User::factory()->create();

        $posts = Post::factory(2)->create([
                'user_id' => $user->id
            ]);

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->last()->id,
                            'attributes' => [
                                'title' => $posts->last()->title,
                                'image' => url($posts->last()->image),
                                'posted_at' => $posts->last()->created_at->diffForHumans(),
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->first()->id,
                            'attributes' => [
                                'title' => $posts->first()->title,
                                'image' => url($posts->first()->image),
                                'posted_at' => $posts->first()->created_at->diffForHumans(),
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/posts')
                ]
            ]);
    }

    /** @test */
    public function a_user_can_only_retrieve_their_posts()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create(), 'api');
        $posts = Post::factory()->create();

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertExactJson([
                'data' => [],
                'links' => [
                    'self' => url('/posts')
                ]
            ]);
    }
}
