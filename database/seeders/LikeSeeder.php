<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Like;

class LikeSeeder extends Seeder {

  public function run() {
    Like::insert([
      [
        'id' => 1,
        'user_id' => 2,
        'post_id' => 1,
      ],
      [
        'id' => 2,
        'user_id' => 3,
        'post_id' => 1,
      ],
      [
        'id' => 3,
        'user_id' => 4,
        'post_id' => 2,
      ],
      [
        'id' => 4,
        'user_id' => 5,
        'post_id' => 2,
      ],
      [
        'id' => 5,
        'user_id' => 5,
        'post_id' => 3,
      ],
    ]);

    Like::refreshAutoIncrements();
  }
}
