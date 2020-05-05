<?php

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
use App\Araqum;

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
        $popular_products = Product::inRandomOrder()->take(3)->get();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $products = Product::where('id','>',0)->paginate(18);
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        $categories = Category::where('parent_id',null)->with('children')->get();
        return view('medshop.shop')->with([
            'products'=>$products,
            'categories'=>$categories,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'popular_products' => $popular_products,
        ]);
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
        if(Auth::user() != null ){
            $ordering_product->user_id = Auth::id();
        }
        $ordering_product->session =  Session::getId();

        if($ordering_product->save()){
            echo 'succes';exit;
        };

    }

    public function product_order(){
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $product_orders = OrderingProduct::all()->where('session',Session::getId());

        return view('medshop.product_order')->with([
            'product_orders'=>$product_orders,
            'ordering_products_count'=>$ordering_products_count,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
        ]);

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
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $product_orders = OrderingProduct::all()->where('session',Session::getId());
        $sum = 0;
        foreach ($product_orders as $product){
            $sum = $sum+($product->product_price*$product->quantity);
        }
        $araqum_sum = Araqum::where('id',1)->first();

        $araqum_sum = $araqum_sum->price;

        return view('medshop.ordering_cart')->with([
            'ordering_products_count'=>$ordering_products_count,
            'sum'=>$sum,
            'product_orders'=>$product_orders,
            'about_headers'=> $about_headers,
            'contact_us' => $contact_us,
            'araqum_sum' => $araqum_sum
        ]);

    }

    public function ordering(Request $request){

        if($request->pay == "non_cash"){
            $this->validate($request,[
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'post_index' => 'required',
            ]);
        }else{
            $this->validate($request,[
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'post_index' => 'required',
                'payment_type' => 'required',
                'pay' => 'required',
            ]);
        }



        $order_id = uniqid(true);
        $ordering = new Ordering();
        $isset_ordering = Ordering::where('session', Session::getId())->first();

        if($isset_ordering){
            $isset_ordering->email = $request->email;
            $isset_ordering->customer_addres = $request->address;
            $isset_ordering->customer_telephone = $request->phone;
            $isset_ordering->amount = $request->sum;
            $isset_ordering->user_id =(Auth::user() != null) ? Auth::user()->id : null;
            if($request->pay == "non_cash"){
                $isset_ordering->cash = 1;
                if($isset_ordering->save()){
                    $sesion = $isset_ordering->session;
                    $product_orders = OrderingProduct::all()->where('session',$sesion);

                    if(isset($product_orders)){
                        foreach ($product_orders as $product_order){
                            OrderingProduct::where('id', $product_order->id)->update([
                                'session' => 1,
                                'order_id' => $isset_ordering->order_id,
                            ]);
                        }
                    }

                    return redirect('/')->with('order', 'Your order is created!');exit;
                }
            }

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

                    return view('medshop.payment.idbank')->with(['array'=>$array]);

                }elseif ($request->payment_type == 'telcell'){
                    return view('medshop.payment.telcel')->with(['order_id'=>$order_id]);
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
            $ordering->user_id =(Auth::user() != null) ? Auth::user()->id : null;
            $ordering->session =Session::getId();
            if((Auth::user()!=null)){
                $ordering->user_id = Auth::id();
            }

            if($request->pay == "non_cash"){
                $ordering->cash = 1;
                if($ordering->save()){
                    $sesion = $ordering->session;
                    $product_orders = OrderingProduct::all()->where('session',$sesion);

                    if(isset($product_orders)){
                        foreach ($product_orders as $product_order){
                            OrderingProduct::where('id', $product_order->id)->update([
                                'session' => 1,
                                'order_id' => $ordering->order_id,
                            ]);
                        }

                        $ordering->session = 1;
                        $ordering->save();
                    }

                    return redirect('/')->with('order', 'Your order is created!');exit;
                }
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
                    return view('medshop.payment.idbank')->with(['array'=>$array]);

                }elseif ($request->payment_type == 'telcell'){
                    return view('medshop.payment.telcel')->with(['order_id'=>$order_id]);


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
        $array["BackURL"] = "http:://medshop/ameria_payment_success";
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

    public function telcel_form($order_id){
        $shop_key = "LEnGy<Hp!s*|n_T!7f{5O]QfTKGod2^gN{O(aBXFchE?ahZPQvSMI6Yq|-z>i9rt[$^HkdWPty?8Oq^ZEb=-i8pxlhdLq7OFZgXBc%IBD>KuYJ[eC{zl3DU1vPuTa9qL";
        $shop_id = $order_id;
        $sum = number_format(1, 2, '.', '');
        $desc = "Telcel paymant". $order_id;
        $currency = "AMD";
        $cur_locale = 'en';
        $locale = 'en';

        $signature = md5($shop_key.
            $shop_id.
            '֏'.
            $sum.
            base64_encode($desc).
            base64_encode($order_id).
            '1'
        );

        return
            '<form target="_blank" action="https://telcellmoney.am/invoices" method="POST" id="telcell_form">'
            . '<input type="hidden" name="action" value="PostInvoice"/>'
            . '<input type="hidden" name="issuer" value="'. $shop_id .'"/>'
            . '<input type="hidden" name="currency" value="֏"/>'
            . '<input type="hidden" name="price" value="'. $sum .'"/>'
            . '<input type="hidden" name="product" value="'. base64_encode($desc) .'"/>'
            . '<input type="hidden" name="issuer_id" value="'. base64_encode($order_id) .'"/>'
            . '<input type="hidden" name="valid_days" value="1"/>'
            . '<input type="hidden" name="security_code" value="'. $signature .'"/>'
            . '<input type="submit" value="Pay telcell"/>'
            . '<a class="button cancel" href="/">Cancel payment and return back to card</a>'
            . '</form>';
    }

}
