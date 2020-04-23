<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\OrderingProduct;
use Session;

class BlogController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(6);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        return view('medshop.blog')->with(['ordering_products_count'=>$ordering_products_count, 'posts' => $posts]);
    }

    public function show($slug) {
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('medshop.blog_sigle')->with(['ordering_products_count'=>$ordering_products_count, 'post' => $post]);
    }
}
