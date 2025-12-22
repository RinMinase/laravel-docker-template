<?php

namespace App\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest {

  public function rules() {
    if ($this->isMethod('delete')) {
      return [];
    }

    return [
      'content' => ['required', 'string', 'max:256'],
    ];
  }

  public function authorize(): bool {
    $user = $this->user();
    $post = $this->route('post');

    if ($post) {
      if ($this->isMethod('delete')) {
        return $user->can('delete', $post);
      }

      return $user->can('update', $post);
    }

    return $user->can('create', $post);
  }

  public function failedValidation(Validator $validator) {
    throw new HttpResponseException(
      response()->json([
        'status' => 401,
        'data' => $validator->errors(),
      ], 401)
    );
  }
}
