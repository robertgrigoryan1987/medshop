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
        return view('medshop.ordering_cart')->with(['ordering_products_count'=>$ordering_products_count, 'sum'=>$sum, 'product_orders'=>$product_orders]);

    }

    public function ordering(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'post_index' => 'required',
            'payment_type' => 'required',
        ]);

        $order_id = uniqid(true);
        $ordering = new Ordering();
        $isset_ordering = Ordering::where('session', Session::getId())->first();
        if($isset_ordering){
            $isset_ordering->email = $request->email;
            $isset_ordering->customer_addres = $request->address;
            $isset_ordering->customer_telephone = $request->phone;
            $isset_ordering->amount = $request->sum;
            $isset_ordering->user_id =isset(Auth::user()->user) ? Auth::user()->user : null;
            if($isset_ordering->save()){
                $array = array(
                    "Amount" => $request->sum,
                    "Language" => app()->getLocale(),
                    "OrderID" => $isset_ordering->order_id,
                    "Description" => "paymant test",
                    "Currency" => "AMD",
                    "CardHolderID" => "45454",
                    "Opaque" => "5454545",
                );

                if($request->payment_type == 'idram'){

                    return view('wixon.payment.idbank')->with(['array'=>$array]);

                }elseif ($request->payment_type == 'telcell'){

                }elseif($request->payment_type == 'ameria'){
                    $this->ameria_payment($array);
                }
            }

        }else{
            $ordering->order_id = $order_id;
            $ordering->email = $request->email;
            $ordering->customer_addres = $request->address;
            $ordering->customer_telephone = $request->phone;
            $ordering->customer_city = $request->city;
            $ordering->amount = $request->sum;
            $ordering->user_id =isset(Auth::user()->user) ? Auth::user()->user : null;
            $ordering->session =Session::getId();
            if(isset(Auth::user()->user)){
                $ordering->user_id = Auth::id();
            }
            if($ordering->save()){
                $array = array(
                    "Amount" => $request->sum,
                    "Language" => app()->getLocale(),
                    "OrderID" => $order_id,
                    "Description" => "paymant test",
                    "Currency" => "AMD",
                    "CardHolderID" => "45454",
                    "Opaque" => "5454545",
                );

                if($request->payment_type == 'idram'){
                    return view('wixon.payment.idbank')->with(['array'=>$array]);

                }elseif ($request->payment_type == 'telcell'){

                }elseif($request->payment_type == 'ameria'){
                    $this->ameria_payment($array);
                }
            }

        }
    }


    public function payment_success(Request $request){
        var_dump($request->all());exit;
    }

    public function ameria_payment($array){

        $clientID = "c0a7031d-b864-4891-992d-8b4c4fc3bf9c";
        $username =  "3d19541048";
        $password = "lazY2k";
        $headers = [
            'Content-Type:application/json',
        ];

        $array["ClientID"] = $clientID;
        $array["Username"] = $username;
        $array["Password"] = $password;
        $array["CardHolderID"] = "24242";
        $array["BackURL"] = "http:://wixon/ameria_payment_success";
        $array["Amount"] = "10";
        $array["OrderID"] = "2325008";
        $array["PaymentType"] = 0;
        $array["Description"] = "ameria payment";
        $array["Currency"] = "AMD";
        $array["Opaque"] = "46464646";

        $postData = json_encode($array,JSON_PRESERVE_ZERO_FRACTION);

        $url = "https://servicestest.ameriabank.am/VPOS/api/VPOS/InitPayment";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
        // curl_setopt($curl, CURLOPT_HEADER, 1); // Uncomment these for debugging
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);

        curl_close($curl);


        /* Check if response code is 1 then go further if not, false return */
        $result_json_decoded = json_decode($result);

        //string(92) "{"PaymentID":"3AFD362B-56E1-4341-80A5-F7C8A0A8A98F","ResponseCode":1,"ResponseMessage":"OK"}"
        if ($result_json_decoded->ResponseCode !== 1) {
            echo 'Error processing checkout. Please contact administrator.';
            return false;
        }

        if ($result) {
            $result = json_decode($result);
        }else{
            echo 'Error processing checkout. Please contact administrator.';

            return false;
        }
        $paymantId = $result->ResponseCode==1 ? $result->PaymentID : false;


        if ($paymantId) {
            $this->proceedPayment($paymantId);
        }

    }

    public function proceedPayment($paymentId)
    {
        if ($paymentId) {
            $paymentQuery = [
                'id'   => $paymentId,
                'lang' => "en",
            ];

            $query = urldecode(http_build_query($paymentQuery));

            $redirect_url = "https://servicestest.ameriabank.am/VPOS/Payments/Pay?".$query;
            header("Location: $redirect_url");
            exit;
        } else {
            var_dump('error');exit;
        }
    }

    public function idram_payment($array){

//        $array = [
//            "ClientID" => "",
//            "Language" => "en",
//            "Amount" => "10",
//            "OrderID" => $order_id,
//            "BackURL" => "http://wixon/payment_success",
//            "Description" => "idbank paymant test",
//            "Currency" => "AMD",
//            "CardHolderID" => "1",
//            "Opaque" => "test",
//            "MerchntId" => "141111",eere
//        ];


        return redirect()->route('login');


        return View::make('wixon.payment.idbank')->with(['array'=>$array]);


    }

}
