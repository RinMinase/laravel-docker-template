<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikePolicy {

  public function viewAny(User $user) {
    return true;
  }

  public function view(User $user, Post $post) {
    return true;
  }

  public function create(User $user, Post $post) {
    return $user->id !== $post->user_id;
  }

  public function update(User $user, Like $like) {
    return $user->id === $like->user_id;
  }

  public function delete(User $user, Like $like) {
    return $user->id === $like->user_id;
  }
}
