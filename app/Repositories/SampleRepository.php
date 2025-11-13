<?php

namespace App\Repositories;

use App\Models\Sample;

class SampleRepository {
  public function get_all() {
    return Sample::all();
  }

  public function get($id) {
    return Sample::where('id', $id)->firstOrFail();
  }

  public function add(array $values) {
    return Sample::create($values);
  }

  public function edit(array $values, $id) {
    return Sample::where('id', $id)->firstOrFail()->update($values, $id);
  }

  public function delete($id) {
    return Sample::where('id', $id)->firstOrFail()->delete();
  }
}
