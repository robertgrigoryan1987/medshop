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

    public function shop_cart_quantity(Request $request){
        if(OrderingProduct::where('id', $request->id)
            ->update(['quantity' => $request->quantity])){
            echo 'success';exit;
        }else{
            echo 'error';exit;
        }
    }

    public function ordering_cart(){
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $product_orders = OrderingProduct::all()->where('session',Session::getId());
        $sum = 0;
        foreach ($product_orders as $product){
            $sum = $sum+($product->product_price*$product->quantity);
        }
        return view('medshop.ordering_cart')->with(['ordering_products_count'=>$ordering_products_count, 'sum'=>$sum]);

    }

    public function ordering(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'post_index' => 'required',
        ]);
        $ordering = new Ordering();
        $isset_ordering = Ordering::where('session', Session::getId())->first();
        if($isset_ordering){
            $isset_ordering->email = $request->email;
            $isset_ordering->customer_addres = $request->address;
            $isset_ordering->customer_telephone = $request->phone;
            $isset_ordering->city = $request->city;
            $isset_ordering->amount = $request->sum;
            $isset_ordering->user_id =isset(Auth::user()->user) ? Auth::user()->user : null;
            $isset_ordering->save();
        }else{
            $ordering->email = $request->email;
            $ordering->customer_addres = $request->address;
            $ordering->customer_telephone = $request->phone;
            $ordering->customer_city = $request->city;
            $ordering->amount = $request->sum;
            $ordering->user_id =isset(Auth::user()->user) ? Auth::user()->user : null;
            $ordering->session =Session::getId();
            $ordering->save();
        }
    }


}
