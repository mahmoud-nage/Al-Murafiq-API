<?php

namespace App\Http\Controllers\API;

use App\General\Banks as Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }
        $records = Bank::where('active', 1)
        ->select('bank_name_'.$lang,'branch_name_'.$lang,'owner_name_'.$lang,'logo','swift_num','account_num')
        ->get();
        if($records->count()>0){
                return response()->json(['status' => 200 , 'data' => $records], 200);
        }else{
                return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }
}
