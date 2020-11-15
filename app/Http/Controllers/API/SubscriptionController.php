<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\General\Subscription;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Subscription::all();
    if ($records) {
      return response()->json(['status' => 200, 'data' => $records], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }
}
