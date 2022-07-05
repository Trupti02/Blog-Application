<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::latest()->paginate(4);
        $featured_blog = Blog::latest()->first();
        return view('welcome',compact('categories','blogs','featured_blog'));
    }

    
}
