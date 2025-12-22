<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource {

  public function toArray($request) {
    return [
      'user' => $this->user,
    ];
  }
}
