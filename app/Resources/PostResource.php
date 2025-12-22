<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource {

  public function toArray($request) {
    return [
      'content' => $this->content,
      'user' => $this->user,
      'comments' => CommentResource::collection($this->comments),
      'comments_count' => count($this->comments),
      'is_liked' => $this->is_liked ?? null,
      'likes' => LikeResource::collection($this->likes),
      'likes_count' => count($this->likes),
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
