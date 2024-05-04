<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private static $post, $image, $imageName, $imageUrl, $directory, $extension;
    use HasFactory;

    public static function addPost($request)
    {
        self::$image        = $request->file('thumbnail');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'upload/post-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;

        self::$post                 = new Post();
        self::$post->title          = $request->title;
        self::$post->description    = $request->description;
        self::$post->thumbnail      = self::$imageUrl;
        self::$post->category_id    = $request->category_id;
        self::$post->post_date      = date('Y-m-d');
        self::$post->status         = $request->status;
        self::$post->save();
    }

    public static function updatePost($request, $id)
    {
        self::$post                 = Post::find($id);
        if ($request->file('thumbnail'))
        {
            if (file_exists(self::$post->thumbnail))
            {
                unlink(self::$post->thumbnail);
            }
            self::$image        = $request->file('thumbnail');
            self::$extension    = self::$image->getClientOriginalExtension();
            self::$imageName    = time().'.'.self::$extension;
            self::$directory    = 'upload/post-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     = self::$directory.self::$imageName;
        }
        else
        {
            self::$imageUrl =  self::$post->thumbnail;
        }
        self::$post->title          = $request->title;
        self::$post->description    = $request->description;
        self::$post->thumbnail      = self::$imageUrl;
        self::$post->category_id    = $request->category_id;
        self::$post->post_date      = date('Y-m-d');
        self::$post->status         = $request->status;
        self::$post->save();
    }

    public static function deletePost($id)
    {
        self::$post = Post::find($id);
        if (file_exists(self::$post->thumbnail))
        {
            unlink(self::$post->thumbnail);
        }
        self::$post->delete();
    }
}
