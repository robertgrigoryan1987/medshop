<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2020
 * Time: 19:50
 */

namespace App\Http\Controllers;
use App\AboutHeader;
use App\ContactUs;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Ordering;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\OrderingProduct;
use Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function product($id){
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $product = Product::where('id',$id)->first();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.sigle_product')->with([
            'product'=>$product,
            'categories'=>$categories,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'popular_products' => $popular_products,
        ]);

    }

    public function product_category($id){
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $products = Product::where('category',$id)->paginate(9);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.product_category')->with([
            'products'=>$products,
            'categories'=>$categories,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'popular_products' => $popular_products,
        ]);

    }

    public function product_add(Request $request){
        var_dump($request->all());exit;
    }

    public function search(Request $request) {
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $categories = Category::where('parent_id',null)->with('children')->get();

        $search = $request->get('search');
        $products = DB::table('products')->where('name', 'like', '%'.$search.'%')->get();


        if($products->isEmpty()) {
            return back()->with('status', 'По вашему запросу ничего не найдено');
        } else {
            return view('medshop.search')->with([
                'products' => $products,
                'categories'=>$categories,
                'ordering_products_count'=>$ordering_products_count,
                'about_headers'=> $about_headers,
                'contact_us' => $contact_us,
                'popular_products' => $popular_products,
            ]);
        }
    }

    public function delete_ordered_product(Request $request){

        $roduct_delete = OrderingProduct::where('id',$request->ordered_product)->delete();
        if($roduct_delete){
            echo $request->ordered_product;exit;
        }
    }

    public function product_category_id($id){
        $categories = Category::all()->where('parent_id',$id);
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $products = Product::where(function ($query ) use ($categories) {
            foreach($categories as $category) {

                $query->orWhere('category',$category->id);
            }
        })->paginate(18);
//        $query = Product::all();
//        foreach($categories as $category){
//            $query->orWhere('category', $category->id);
//        }
//        $products = $query->paginate(18);

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.products_parentcategory')->with([
            'products'=>$products,
            'categories'=>$categories,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'popular_products' => $popular_products,
        ]);

        }
}
