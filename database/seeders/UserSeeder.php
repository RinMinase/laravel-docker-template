<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder {

  public function run() {

    $sample_password_hash = Hash::make('password');
    $now = now();

    User::insert([
      [
        'id' => 1,
        'name' => 'User 1',
        'email' => 'user_1@mail.com',
        'email_verified_at' => $now,
        'password' => $sample_password_hash,
        'remember_token' => Str::random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'id' => 2,
        'name' => 'User 2',
        'email' => 'user_2@mail.com',
        'email_verified_at' => $now,
        'password' => $sample_password_hash,
        'remember_token' => Str::random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'id' => 3,
        'name' => 'User 3',
        'email' => 'user_3@mail.com',
        'email_verified_at' => $now,
        'password' => $sample_password_hash,
        'remember_token' => Str::random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'id' => 4,
        'name' => 'User 4',
        'email' => 'user_4@mail.com',
        'email_verified_at' => $now,
        'password' => $sample_password_hash,
        'remember_token' => Str::random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'id' => 5,
        'name' => 'User 5',
        'email' => 'user_5@mail.com',
        'email_verified_at' => $now,
        'password' => $sample_password_hash,
        'remember_token' => Str::random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ],
    ]);

    User::refreshAutoIncrements();
  }
}
