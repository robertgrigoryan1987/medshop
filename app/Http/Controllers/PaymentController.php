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
        $paymenment_order = Ordering::where('order_id', $_REQUEST['EDP_BILL_NO'])->first();
        if(isset($paymenment_order)){
            $paymenment_order->update([
                'order_status' => 1,
            ]);
        }

        $sesion = $paymenment_order->session;
        $product_orders = OrderingProduct::all()->where('session',$sesion);

        if(isset($product_orders)){
            foreach ($product_orders as $product_order){
                OrderingProduct::where('id', $product_order->id)->update([
                    'session' => 1,
                    'order_id' => $_REQUEST['EDP_BILL_NO'],
                ]);
            }
        }

        return redirect()->route('home')->with('status', 'You are pay succesfuly!');

    }

    public function idram_paymant_fail(Request $request){
        return redirect()->route('home')->with('status', 'Error!');

    }

    public function idram_paymant_result(Request $request){

        $SECRET_KEY = "g6K5YuXajQzWMecH3FPJk5tkERQScDEASE5aNm";
        $EDP_REC_ACCOUNT = "110000298";

        if(isset($_REQUEST['EDP_PRECHECK']) && isset($_REQUEST['EDP_BILL_NO']) && isset($_REQUEST['EDP_REC_ACCOUNT']) && isset($_REQUEST['EDP_AMOUNT'])) {
            if($_REQUEST['EDP_PRECHECK'] == "YES") {
                if($_REQUEST['EDP_REC_ACCOUNT'] == $EDP_REC_ACCOUNT) {
                    $bill_no = $_REQUEST['EDP_BILL_NO'];
                    $req_amount = $_REQUEST['EDP_AMOUNT'];
                    $orderid = Ordering::where('order_id',$bill_no)->first();
                    if($orderid['order_id'] == $bill_no  && $req_amount == $orderid['amount']){
                        echo "ok";
                    }
                }
            }
        }

        if(isset($_REQUEST['EDP_PAYER_ACCOUNT']) && isset($_REQUEST['EDP_BILL_NO']) && isset($_REQUEST['EDP_REC_ACCOUNT']) && isset($_REQUEST['EDP_AMOUNT']) && isset($_REQUEST['EDP_TRANS_ID']) && isset($_REQUEST['EDP_CHECKSUM'])) {
            $txtToHash =  $EDP_REC_ACCOUNT . ":" . $_REQUEST['EDP_AMOUNT'] . ":" . $SECRET_KEY . ":" . $_REQUEST['EDP_BILL_NO'] . ":" . $_REQUEST['EDP_PAYER_ACCOUNT'] . ":" . $_REQUEST['EDP_TRANS_ID'] . ":" . $_REQUEST['EDP_TRANS_DATE'];

            if(strtoupper($_REQUEST['EDP_CHECKSUM']) != strtoupper(md5($txtToHash))) {
                return false;
            } else {

                echo("OK");
            }
        }
    }

    public function idram_paymant($data){
        return view('medshop.payment.idbank')->with(['array'=>$data]);
    }

    public function pay_ok(){
        $pay = 1;
        if($pay == 1){
            $paymenment_order = Ordering::where('order_id', '15ea5d2022e32c')->first();
            if(isset($paymenment_order)){
                $paymenment_order->update([
                    'order_status' => 1,
                ]);
            }

            $sesion = $paymenment_order->session;
            $product_orders = OrderingProduct::all()->where('session',$sesion);

            if(isset($product_orders)){
                foreach ($product_orders as $product_order){
                    OrderingProduct::where('id', $product_order->id)->update([
                        'session' => 1,
                    ]);
                }
            }
            return redirect()->route('home')->with('status', 'You are pay succesfuly!');
        }

    }

    public function telcel_pay(){
        https://telcellmoney.am/proto_test2/invoices/?description=VGVzdA%3D%3D&sum=1.0&currency=51&issuer_id=aXNzdWVyMDAyMw%3D%3D&valid_days=1&bill:issuer=sas%40test.test&buyer=3283005053463&checksum=15dc50a6870bdfeecd670899aeb22c4e
    }



    public function telsel_payment_test(){
        $issues = '02690198@shop.telcell.am';
        $key = 'hMfnXE8v|3&GOpc@x_6tC5cT}7mDJC2WmL*x-^d+W{RfD+~}lfcai#A@.4Cxa|VN2!oD^3ZrGMxS))Pn';
        $buyer = '454545';
        $currency = "AMD";
        $sum = "10";
        $description = "telsel pay";
        $valid_days = 1;
        $issuer_id = 1;
        $url_issuer_id = urlencode(base64_encode("Test"));
        var_dump($url_issuer_id);

        $checksum =  md5($key.$issues.$buyer.$currency.$sum.$description.$valid_days.$issuer_id);


    }

    public function ameria_payment_success(){
        var_dump($_REQUEST);exit;
    }



}