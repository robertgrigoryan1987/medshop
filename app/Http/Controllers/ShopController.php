<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Ordering;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\OrderingProduct;
use Session;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        if(!isset($_COOKIE["customer"])) {
//            echo "Cookie named is not set!";
//        } else {
//            echo "Cookie  is set!<br>";
//            echo "Value is: " . $_COOKIE["customer"];
//        }
        $products = Product::where('id','>',0)->paginate(9);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.shop')->with(['products'=>$products, 'categories'=>$categories, 'ordering_products_count'=>$ordering_products_count]);
    }

    public function shop_cart(Request $request){
        $ordering_product = new OrderingProduct();
        $product_id = $request->product_id;
        $ordering_product->product_id =  $product_id ;
        $ordering_product->order_id =  null ;
        $ordering_product->product_name =  $request->product_name ;
        $ordering_product->product_price =  $request->product_price  ;
        $ordering_product->image =  $request->product_image  ;
        $ordering_product->quantity =  1 ;
        $ordering_product->session =  Session::getId();

        if($ordering_product->save()){
            echo 'succes';exit;
        };

    }

    public function product_order(){
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $product_orders = OrderingProduct::all()->where('session',Session::getId());
        return view('medshop.product_order')->with(['product_orders'=>$product_orders, 'ordering_products_count'=>$ordering_products_count]);

    }


}
