<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsRelationshipReource extends JsonResource
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
                    'self' => '',
                    'related' => '',
                ],

                'data' => new AuthorIdentifierResource($this->author)
            ],

            'comments' => new PostCommentRelationshipCollection($this->comments)
        ];
    }
}
