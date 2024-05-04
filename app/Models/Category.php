<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
    ];

    public static function newCategory($request)
    {
        self::$category                 = new Category();
        self::$category->title          = $request->title;
        self::$category->description    = $request->description;
        self::$category->author         = $request->author;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category                 = Category::find($id);
        self::$category->title          = $request->title;
        self::$category->description    = $request->description;
        self::$category->author         = $request->author;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        self::$category->delete();
    }

}
