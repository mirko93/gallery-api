<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GalleryReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_gallery_can_be_added_to_the_gallery()
    {
        $response = $this->post('/api/galleries', $this->data());

        $this->assertCount(1, Gallery::all());
    }

    /** @test */
    public function fields_are_required()
    {
        collect(['title', 'desc', 'imageUrl'])
            ->each(function ($field) {
                $response = $this->post('/api/galleries',
                    array_merge($this->data(), [$field => '']));

                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Gallery::all());
            }); 
    }

    /** @test */
    public function imageUrl_must_be_a_valid_url()
    {
        $response = $this->post('/api/galleries', 
            array_merge($this->data(), ['imageUrl' => 'NOT AN JPG, PNG FILE']));

        $response->assertSessionHasErrors('imageUrl');
        $this->assertCount(0, Gallery::all());
    }

    /** @test */
    public function a_gallery_can_be_updated()
    {        
        $this->withoutExceptionHandling();

        $this->post('/api/galleries', [
            'title' => 'Gallery Name',
            'desc' => 'New Gallery Posts',
            'imageUrl' => 'image.jpg' 
        ]);

        $gallery = Gallery::first();

        $response = $this->patch('/api/galleries', [
            'title' => 'Name',
            'desc' => 'New Posts',
            'imageUrl' => 'new.jpg'
        ]);

        $this->assertEquals('Name', Gallery::first()->title);
        $this->assertEquals('New Posts', Gallery::first()->desc);
        $this->assertEquals('new.jpg', Gallery::first()->imageUrl);
    }

    /** @test */
    public function a_gallery_can_be_deleted()
    {
        $this->post('/api/galleries', $this->data());

        // problem gallery -> title of not-object
        $gallery = Gallery::first();

        $response = $this->delete('/api/galleries/' . $gallery->id);

        $this->assertCount(0, Gallery::all());
    }

    private function data()
    {
        return [
            'title' => 'Gallery Name',
            'desc' => 'New Gallery Posts',
            'imageUrl' => 'image.jpg' 
        ];
    }
}
