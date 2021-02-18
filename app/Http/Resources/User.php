<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
                'type' => 'users',
                'post_id' => $this->id,
                'attributes' => [
                    'firstname' => $this->firstname,
                    'lastname' => $this->lastname,
                ]
            ],
            'links' => [
                'self' => url('/users/' . $this->id),
            ]
        ];
    }
}
