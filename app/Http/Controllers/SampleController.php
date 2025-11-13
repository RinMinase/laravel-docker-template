<?php

namespace App\Http\Controllers;

use App\Repositories\SampleRepository;
use App\Requests\SampleRequest;
use App\Resources\SampleResource;

class SampleController {

  private SampleRepository $sample_repository;

  public function __construct(SampleRepository $sample_repository) {
    $this->sample_repository = $sample_repository;
  }

  public function get_all() {
    $data = $this->sample_repository->get_all();

    return SampleResource::collection($data);
  }

  public function get($id) {
    $data = $this->sample_repository->get($id);

    return new SampleResource($data);
  }

  public function add(SampleRequest $request) {
    $values = $request->only(['name', 'value']);

    return $this->sample_repository->create($values);
  }

  public function edit(SampleRequest $request, $id) {
    $values = $request->only(['name', 'value']);

    return $this->sample_repository->update($values, $id);
  }

  public function delete($id) {
    return $this->sample_repository->delete($id);
  }
}
