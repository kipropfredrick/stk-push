<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once(_DIR_.('/../../../../vendor/autoload.php'));
use Africastalking\SDK\Africastaliking;
use http\Adapter\BuzAdapter;
class PaymentsController extends Controller
{
    public function PaymentAPI(Request $request){
        $user='sandbox';
        $apikey='4068bf8c913289220d54b31f01b73038321be056950e2db385120699f2e4cb19';
        $AT= new AfricasTalking($user,$apikey);
        $payment=$AT->payments();
        $productname='stkpush';
        $phoneNumber=$request->phone;
        $currencycode='KES';
        $amount=$request->amount;

        $metadata=[
          "customerId"=>"123"
        ];
        try {
            $result=$payments->mobileCheckout(
             [
                 "productName"=>$productname,
                 "phoneNumber"=>$phoneNumber,
                 "currencyCode"=>$currencycode,
                 "amount"=>$amount,
                 "metadata"=>$metadata
             ]
            );
        } catch (Exception $e) {
            echo"Error:".$e->getMessage();
        }
        echo $result;
    }
}
