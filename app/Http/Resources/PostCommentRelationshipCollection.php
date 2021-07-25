<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCommentRelationshipCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = $this->additional['post'];

        return [
            'data' => CommentIdentifierResource::collection($this->collection),
            'links' => [
                'self' => route('posts.relationship.comments', ['post' => $post]),
                'related' => route('posts.comments', ['post' => $post]),
            ],
        ];
    }
}
