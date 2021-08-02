<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => PostResource::collection($this->collection)
        ];
    }

    public function with($request)
    {

        $authors = $this->collection->map(function ($post) {
            return $post->author;
        });

        return [
            'links' => [
                'self' => route('posts.index')
            ],

            'included' => $authors->map(function ($author) {
                return new UserResource($author);
            })


        ];
    }
}
