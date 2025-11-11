<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Sample;

class DatabaseSeeder extends Seeder {

  public function run(): void {

    User::create([
      'name' => 'Test User',
      'email' => 'test@example.com',
      'email_verified_at' => now(),
      'password' => Hash::make('password'),
      'remember_token' => Str::random(10),
    ]);

    $data = [
      ['name' => 'John Doe', 'value' => 1234],
      ['name' => 'Jane Doe', 'value' => 2345],
      ['name' => 'Richard Roe', 'value' => 3456],
      ['name' => 'Mary Roe', 'value' => 4567],
      ['name' => 'Jane Smith', 'value' => 5678],
      ['name' => 'Jenny Public', 'value' => 1235],
      ['name' => 'Jack Brown', 'value' => 1236],
      ['name' => 'James Doe', 'value' => 1237],
    ];

    foreach ($data as $item) Sample::create($item);
  }
}
