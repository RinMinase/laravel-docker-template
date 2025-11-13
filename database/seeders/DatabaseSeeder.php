<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Sample;

class DatabaseSeeder extends Seeder {

  public function run(): void {
    // User::factory(10)->create();

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
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
