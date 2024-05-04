<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $postObj = new Post();
        $posts = $postObj->join('categories','categories.id','=','posts.category_id')
                ->select('posts.*','categories.title as category_name')
                ->where('posts.status',1)
                ->orderby('posts.id','desc')
                ->get();
        $categories = Category::all();

        return view('layouts.user.index',compact('posts','categories'));
    }
    public function single_post_view($id)
    {
        $postObj = new Post();
        $post = $postObj->join('categories','categories.id','=','posts.category_id')
                ->select('posts.*','categories.title as category_name')
                ->where('posts.id',$id)
                ->first();
        $commentObj = new PostComment();

        $comments = $commentObj->join('users','users.id','=','post_comments.user_id')
            ->select('post_comments.*','users.name as users_name')
            ->where('post_comments.post_id',$id)
            ->paginate(3);


        return view('layouts.user.single_post_view',compact('post','comments'));
    }

    public function filter_by_category($id)
    {
        $postObj = new Post();
        $posts = $postObj->join('categories','categories.id','=','posts.category_id')
            ->select('posts.*','categories.title as category_name')
            ->where('posts.status',1)
            ->where('posts.category_id',$id)
            ->orderby('posts.id','desc')
            ->get();


        return view('layouts.user.filter_by_category',compact('posts'));
    }

    public function comment_store(Request $request,$id)
    {
        PostComment::newPostComment($request, $id);

        $notification =['message' => 'post comment created successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function comment_update(Request $request, $id)
    {
        PostComment::updatePostComment($request, $id);
        $notification =['message' => 'post comment update successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function comment_delete($id)
    {
        PostComment::deletePostComment( $id);
        $notification =['message' => 'post comment delete successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
