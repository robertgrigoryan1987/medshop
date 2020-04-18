<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('id','>',0)->paginate(9);

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.shop')->with(['products'=>$products, 'categories'=>$categories]);
    }
}
