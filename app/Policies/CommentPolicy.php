<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentPolicy {

  public function viewAny(User $user) {
    return true;
  }

  public function view(User $user, Post $post) {
    return true;
  }

  public function create(User $user, Post $post) {
    return true;
  }

  public function update(User $user, Comment $comment) {
    return $user->id === $comment->user_id;
  }

  public function delete(User $user, Comment $comment) {
    return $user->id === $comment->user_id;
  }
}
