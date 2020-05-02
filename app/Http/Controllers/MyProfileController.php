<?php

namespace App\Http\Controllers;


use App\AboutHeader;
use App\OrderingProduct;
use App\Ordering;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function index() {
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $user = Auth::user();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $user_order_products = OrderingProduct::all()->where('user_id', $user->id);
        return view('medshop.profile')->with([
            'ordering_products_count'=>$ordering_products_count,
            'user_order_products' => $user_order_products,
            'about_headers'=> $about_headers,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'	=>	'required',
            'phone' => 'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);

        $user = Auth::user();
        $user->edit($request->all());

        return redirect()->back()->with('status', 'Профиль успешно обновлен');
    }
}
