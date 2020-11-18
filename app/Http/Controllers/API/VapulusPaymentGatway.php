<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VapulusPaymentGatway extends Controller
{
    public function show_frame(){
        return view('Gateways.Vapulus');
    }

     // $postData = array(
    //     "cardNum" =>  "5123456789012346",
    //     "cardExp" =>  2105,
    //     "cardCVC" =>  123,
    //     "holderName" => "John Doe",
    //     "mobileNumber" => "20100000000000"
    // );
    
    // $hashSecret= 'C0DF9A7B3819968807A9D4E48D0E65C6';
    
    // $secureHash = generateHash($hashSecret,$postData);


    function generateHash($hashSecret,$postData) {
        ksort($postData);
    
        $message="";
        $appendAmp=0;
        foreach($postData as $key => $value) {
                if (strlen($value) > 0) {
                    if ($appendAmp == 0) {
                        $message .= $key . '=' . $value;
                        $appendAmp = 1;
                    } else {
                        $message .= '&' . $key . "=" . $value;
                    }
                }
            }
    
        $secret = pack('H*', $hashSecret);
    
        return hash_hmac('sha256', $message, $secret);
    }


   

    function HTTPPost($url, array $params) {
        $query = http_build_query($params);
        $ch    = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
