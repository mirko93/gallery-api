<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostToTimelineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_post_a_gallery_post()
    {
        $this->withoutExceptionHandling();
        
        $this->actingAs($user = User::factory()->create(), 'api');

        $response = $this->post('/api/posts', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'title' => 'Testing Body',
                ]
            ]
        ]);

        $post = Post::first();

        $this->assertCount(1, Post::all());
        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('Testing Body', $post->title);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'posts',
                    'post_id' => $post->id,
                    'attributes' => [
                        'posted_by' => [
                            'data' => [
                                'attributes' => [
                                    'firstname' => $user->firstname,
                                    'lastname' => $user->lastname,
                                ]
                            ]
                        ],
                        'title' => 'Testing Body'
                    ]
                ],
                'links' => [
                    'self' => url('/posts/' . $post->id),
                ]
            ]);
    }
}
