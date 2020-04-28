<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2020
 * Time: 19:50
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Ordering;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\OrderingProduct;
use Session;


class ProductController extends Controller
{
    public function product($id){
        $product = Product::where('id',$id)->first();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.sigle_product')->with(['product'=>$product, 'categories'=>$categories, 'ordering_products_count'=>$ordering_products_count]);

    }

    public function product_category($id){
        $products = Product::where('category',$id)->paginate(9);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.product_category')->with(['products'=>$products, 'categories'=>$categories, 'ordering_products_count'=>$ordering_products_count]);

    }

    public function product_add(Request $request){
        var_dump($request->all());exit;
    }

}