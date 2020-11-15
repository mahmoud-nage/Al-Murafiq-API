<?php

namespace App\Http\Controllers\API;

use App\General\Address;
use Illuminate\Http\Request;
use App\General\BusinessSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{


    private $setting;

    public function __construct()
    {
        $this->setting = BusinessSettings::all();
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }

        $general_paginate_count = $this->setting->where('type', 'general_paginate_count')->first()->value;
        $general_paginate_count = $general_paginate_count ? $general_paginate_count : 9;

        $records = Address::with('area')->where('user_id', $request->user_id)->latest()->paginate($general_paginate_count);
        if ($records) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        }
        return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:addresses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }
        $record = Address::with('area')->where('id', $request->id)->where('user_id', $request->user_id)->first();

        if ($record) {
            return response()->json(['status' => 200, 'data' => $record], 200);
        }

        return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'area_id' => 'required|exists:areas,id',
            'phone' => 'required',
            'address_details' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }

        $record = Address::create([
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'address_details' => $request->address_details,
            'area_id' => $request->area_id,
            'special_mark' => $request->special_mark,
            'lat' => $request->lat,
            'lon' => $request->lon,
        ]);
        if ($record) {
            return response()->json(['status' => 200, 'message' => __('messages.success_address')], 200);
        }
        return response()->json(['status' => 400, 'message' => __('messages.wrong')], 200);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:addresses,id',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }

        $record = Address::where('id', $request->id)->where('user_id', $request->user_id)->first();
        if ($record) {
            $delete = $record->delete();
            if ($delete) {
                return response()->json(['status' => 200, 'message' => __('messages.address_deleted')], 200);
            }
        }
        return response()->json(['status' => 400, 'message' => __('messages.wrong')], 200);
    }
}
