<?

namespace App\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Comment;
use App\Models\Post;
use App\Requests\CommentRequest;

class CommentController {

  use AuthorizesRequests;

  public function create(CommentRequest $request, Post $post) {
    try {
      $this->authorize('create', [Comment::class, $post]);
    } catch (AuthorizationException) {
      return response()->json([
        'status' => 403,
        'message' => 'You are not allowed to coment on your own post',
      ], 403);
    }

    $validated = $request->validated();

    $post->comments()->create([
      'user_id' => auth()->id(),
      'content' => $validated['content'],
    ]);

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }

  public function edit(CommentRequest $request, Comment $comment) {
    $this->authorize('update', [Comment::class, $comment]);
    $validated = $request->validated();

    $comment->update([
      'content' => $validated['content'],
    ]);

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }

  public function delete(CommentRequest $request, Comment $comment) {
    $this->authorize('delete', [Comment::class, $comment]);
    $comment->delete();

    return response()->json([
      'status' => 200,
      'message' => 'Success',
    ]);
  }
}
