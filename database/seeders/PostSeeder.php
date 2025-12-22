<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;

class PostSeeder extends Seeder {

  public function run() {
    Post::insert([
      [
        'id' => 1,
        'content' => 'Sample Post 1 from User 1',
        'user_id' => 1,
      ],
      [
        'id' => 2,
        'content' => 'Sample Post 2 from User 1',
        'user_id' => 1,
      ],
      [
        'id' => 3,
        'content' => 'Sample Post 3 from User 1',
        'user_id' => 1,
      ],
      [
        'id' => 4,
        'content' => 'Sample Post 4 from User 2',
        'user_id' => 2,
      ],
      [
        'id' => 5,
        'content' => 'Sample Post 5 from User 2',
        'user_id' => 2,
      ],
      [
        'id' => 6,
        'content' => 'Sample Post 6 from User 3',
        'user_id' => 3,
      ],
    ]);

    Post::refreshAutoIncrements();
  }
}
