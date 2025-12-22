<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Comment;

class CommentSeeder extends Seeder {

  public function run() {
    Comment::insert([
      [
        'id' => 1,
        'content' => 'Sample Comment 1 to Post 1 from User 2',
        'user_id' => 2,
        'post_id' => 1,
      ],
      [
        'id' => 2,
        'content' => 'Sample Comment 2 to Post 1 from User 3',
        'user_id' => 3,
        'post_id' => 1,
      ],
      [
        'id' => 3,
        'content' => 'Sample Comment 1 to Post 2 from User 4',
        'user_id' => 4,
        'post_id' => 2,
      ],
    ]);

    Comment::refreshAutoIncrements();
  }
}
