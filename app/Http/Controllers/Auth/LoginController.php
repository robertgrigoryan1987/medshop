<?php

namespace App\Http\Controllers\Auth;

use App\AboutHeader;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\OrderingProduct;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        return view('auth.login')->with([
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
        ]);
    }
}
