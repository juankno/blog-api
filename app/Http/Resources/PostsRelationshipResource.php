<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsRelationshipResource extends JsonResource
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
            'author' => [
                'links' => [
                    'self' => route('posts.relationship.author', ['post' => $this->id]),
                    'related' => route('posts.author', ['post' => $this->id]),
                ],

                'data' => new AuthorIdentifierResource($this->author)
            ],

            'comments' => (new PostCommentRelationshipCollection($this->comments))
                ->additional(["post" => $this])
        ];
    }
}
