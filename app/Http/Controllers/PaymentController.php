<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.04.2020
 * Time: 14:52
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Ordering;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\OrderingProduct;
use Session;


class PaymentController extends Controller
{
    public function idram_payment_success(Request $request){
        var_dump($request->all());
    }

    public function idram_paymant_fail(Request $request){
        var_dump($request->all());
    }

    public function idram_paymant_result(Request $request){
        var_dump($request->all());
    }

}