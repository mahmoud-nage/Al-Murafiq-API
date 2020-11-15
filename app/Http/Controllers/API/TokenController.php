<?php

namespace App\Http\Controllers\API;

use App\General\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TokenController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  public function saveTokens(Request $request){
    $validator = Validator::make($request->all(), [
            'new_token' => 'required',
            // 'provider' => 'required_with:new_token',
        ]);
        
        if ($validator->fails()) {
          return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }
        
        if(!$request->old){
            $token = Token::create([
              'fcm_token' => $request->new_token,
              'provider' => $request->provider,
              ]);
            return response()->json(['status' => 200, 'message' => 'Token Saved successfully'], 200);
        }else if($request->has('old') && $request->old){
            $token = Token::where('fcm_token', $request->old)->update(['fcm_token' => $request->new_token]);
            return response()->json(['status' => 200, 'message' => 'Token Saved successfully'], 200);
        }
        return response()->json(['status' => 400, 'message' => __('messages.wrong')], 200);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}
