<?

namespace App\Controllers;

use App\Models\Post;
use App\Requests\PostRequest;
use App\Resources\PostResource;

class PostController {

  public function get_all_per_user() {
    $data = Post::select()
      ->with([
        'user',
        'likes',
        'comments' => function ($query) {
          $query->latest();
        }
      ])
      ->withExists([
        'likes as is_liked' => function ($query) {
          $query->where('user_id', auth()->id());
        }
      ])
      ->orderBy('created_at', 'desc')
      ->get();

    return PostResource::collection($data);
  }

  public function create(PostRequest $request) {
    $values = $request->only(['content']);

    Post::create([
      ...$values,
      'user_id' => auth()->id(),
    ]);

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }

  public function get($id) {
    $data = Post::select()
      ->with([
        'user',
        'likes',
        'comments' => function ($query) {
          $query->latest();
        }
      ])
      ->withExists([
        'likes as is_liked' => function ($query) {
          $query->where('user_id', auth()->id());
        }
      ])
      ->where('id', $id)
      ->firstOrFail();

    return new PostResource($data);
  }

  public function edit(PostRequest $request, Post $post) {
    $values = $request->only(['content']);

    $post->update($values);

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }

  public function delete(PostRequest $request, Post $post) {
    $post->delete();

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }
}
