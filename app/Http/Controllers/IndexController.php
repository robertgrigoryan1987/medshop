<?php

namespace App\Http\Controllers;

use App\AboutHeader;
use App\ContactUs;
use App\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Ordering;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\OrderingProduct;
use Session;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $cookie_name = "customer";
//        $cookie_value = Str::random(12);
//        setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $home_slider1 = HomeSlider::where('id', 1)->firstOrFail();
        $home_slider2 = HomeSlider::where('id', 2)->firstOrFail();
        $home_slider3 = HomeSlider::where('id', 3)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $products = Product::where('id','>',0)->paginate(9);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.index')->with([
            'products'=>$products,
            'categories'=>$categories,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'home_slider1' => $home_slider1,
            'home_slider2' => $home_slider2,
            'home_slider3' => $home_slider3,
            'popular_products' => $popular_products,
        ]);

    }
}
