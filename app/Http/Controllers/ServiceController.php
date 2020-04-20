<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderingProduct;
use Session;

class ServiceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        return view('medshop.service')->with(['ordering_products_count'=>$ordering_products_count]);
    }
}
