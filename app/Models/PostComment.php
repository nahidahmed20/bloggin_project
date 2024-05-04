<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    private static $postComment;
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    public static function newPostComment($request, $id)
    {
        self::$postComment = new PostComment();
        self::$postComment->post_id = $id;
        self::$postComment->user_id = auth()->user()->id;
        self::$postComment->comment = $request->comment;
        self::$postComment->save();
    }
    public static function updatePostComment($request, $id)
    {
        self::$postComment = PostComment::find($id);
        self::$postComment->comment = $request->comment;
        self::$postComment->save();
    }

    public static function deletePostComment($id)
    {
        self::$postComment = PostComment::find($id);
        self::$postComment->delete();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
