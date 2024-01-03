<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public  function index()
    {
        $posts = Blog::getAllBlog();

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show($post)
    {
        $post = Blog::getSingleBlog($post);

        return view('blog.show', ['post' => $post]);
    }

}
