<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = $request->user();

        return [
            'type' => $this->getTable(),
            'id' => $this->id,
            "attributes" => [
                'title' =>  $this->title,
            ],

            $this->mergeWhen($user->isAdmin(), [
                'created' => $this->created_at,
            ]),

            'relationships' => new PostsRelationshipReource($this),

            "links" => [
                'self' => route('posts.show', ['post' => $this->id])
            ]
        ];
    }
}
