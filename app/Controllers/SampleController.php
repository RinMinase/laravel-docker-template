<?php

namespace App\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController {
  public function get_all() {
    return Sample::all();
  }

  public function get($id) {
    return Sample::where('id', $id)->firstOrFail();
  }

  public function add(Request $request) {
    $values = $request->only(['name', 'value']);

    return Sample::create($values);
  }

  public function edit(Request $request, $id) {
    $values = $request->only(['name', 'value']);

    return Sample::where('id', $id)->firstOrFail()->update($values);
  }

  public function delete($id) {
    return Sample::where('id', $id)->firstOrFail()->delete();
  }
}
