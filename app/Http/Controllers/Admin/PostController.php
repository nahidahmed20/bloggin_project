<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $objPost = new Post();
        $posts = $objPost->join('categories','categories.id','=','posts.category_id')
            ->select('posts.*','categories.title as category_name')->get();
        return view('admin.post',compact('categories','posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title'         => 'required',
            'description'   => 'required',
            'category_id'   => 'required',
        ];

        $validateor = Validator::make($request->all(),$data);

        if ($validateor->fails())
        {
            return redirect()->back()->withInput()->withErrors($validateor);
        }

        Post::addPost($request);
        $notification =['message' => 'Post Added successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = [
            'title'         => 'required',
            'description'   => 'required',
            'category_id'   => 'required',
        ];

        $validateor = Validator::make($request->all(),$data);

        if ($validateor->fails())
        {
            return redirect()->back()->withInput()->withErrors($validateor);
        }

        Post::updatePost($request, $id);
        $notification =['message' => 'Post Update successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Post::deletePost($id);

        $notification =['message' => 'Post Deleted successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
