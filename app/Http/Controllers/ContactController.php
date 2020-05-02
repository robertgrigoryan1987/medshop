<?php

namespace App\Http\Controllers;

use App\AboutHeader;
use Illuminate\Http\Request;
use App\OrderingProduct;
use Session;

class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        return view('medshop.contact')->with([
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
        ]);
    }
}
