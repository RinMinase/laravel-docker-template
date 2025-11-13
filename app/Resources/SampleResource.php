<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SampleResource extends JsonResource {

  public function toArray($request) {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'value' => $this->value,
    ];
  }
}
