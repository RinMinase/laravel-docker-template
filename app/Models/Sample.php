<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model {

  protected $fillable = [
    'name',
    'value',
  ];

  protected $hidden = [
    'updated_at'
  ];

  protected function casts(): array {
    return [
      'created_at' => 'datetime:Y-m-d H:i:s',
    ];
  }
}
