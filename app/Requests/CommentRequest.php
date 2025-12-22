<?php

namespace App\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentRequest extends FormRequest {

  public function rules() {
    if ($this->isMethod('delete')) {
      return [];
    }

    return [
      'content' => ['required', 'string', 'max:256'],
    ];
  }

  public function authorize(): bool {
    return true;
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
