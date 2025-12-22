<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource {

  public function toArray($request) {
    return [
      'content' => $this->content,
      'user' => $this->user,
    ];
  }
}
