<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRelationshipController extends Controller
{
    public function author(Post $post)
    {
        return new UserResource($post->author);
    }

    public function comments(Post $post)
    {
        return  CommentResource::collection($post->comments);
    }
}
