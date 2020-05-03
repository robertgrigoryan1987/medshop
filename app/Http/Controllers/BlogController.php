<?php

namespace App\Http\Controllers;

use App\AboutHeader;
use App\ContactUs;
use App\Post;
use App\QuestionsImage;
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
        $popular_posts = Post::inRandomOrder()->take(3)->get();
        $blog_images = QuestionsImage::all();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $posts = Post::paginate(6);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();

        return view('medshop.blog')->with([
            'ordering_products_count'=>$ordering_products_count,
            'posts' => $posts,
            'about_headers'=> $about_headers,
            'popular_posts' => $popular_posts,
            'blog_images' => $blog_images,
            'contact_us' => $contact_us,
        ]);
    }

    public function show($slug) {
        $popular_posts = Post::inRandomOrder()->take(3)->get();
        $blog_images = QuestionsImage::all();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $post = Post::where('slug', $slug)->firstOrFail();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();

        return view('medshop.single_blog')->with([
            'ordering_products_count'=>$ordering_products_count,
            'post' => $post,
            'about_headers'=> $about_headers,
            'popular_posts' => $popular_posts,
            'blog_images' => $blog_images,
            'contact_us' => $contact_us,
        ]);
    }
}
