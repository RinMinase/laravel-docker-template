<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\RefreshableAutoIncrements;

class Post extends Model {

  use RefreshableAutoIncrements;

  protected $fillable = [
    'content',
    'user_id',
  ];

  protected $hidden = [];

  protected function casts(): array {
    return [
      'created_at' => 'datetime:Y-m-d H:i:s',
      'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
  }

  public function user() {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function likes() {
    return $this->hasMany(Like::class, 'post_id');
  }

  public function comments() {
    return $this->hasMany(Comment::class, 'post_id');
  }
}
