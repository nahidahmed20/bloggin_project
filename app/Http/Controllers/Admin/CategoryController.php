<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category',['categories'=>Category::orderBy('id', 'desc')->get()]);
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
            'title'     => 'required',
            'description'   => 'required',
            'author'    => 'required',
        ];

        $validateor = Validator::make($request->all(),$data);

        if ($validateor->fails())
        {
            return redirect()->back()->withInput()->withErrors($validateor);
        }

        Category::newCategory($request);

        $notification =['message' => 'Category created successfully', 'alert-type' => 'success'];
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
    public function update(Request $request, $id)
    {
        $data = [
            'title'     => 'required',
            'description'   => 'required',
            'author'    => 'required',
        ];

        $validateor = Validator::make($request->all(),$data);

        if ($validateor->fails())
        {
            return redirect()->back()->withInput()->withErrors($validateor);
        }

        Category::updateCategory($request, $id);

        $notification =['message' => 'Category Update successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Category::deleteCategory($id);

        $notification =['message' => 'Category Deleted successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
