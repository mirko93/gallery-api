<?php

namespace App\Http\Resources;

use App\Http\Resources\User as ResourceUser;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'posts',
                'post_id' => $this->id,
                'attributes' => [
                    'posted_by' => new ResourceUser($this->user),
                    'title' => $this->title,
                ]
            ],
            'links' => [
                'self' => url('/posts/' . $this->id),
            ]
        ];
    }
}
