<?php

namespace App\Http\Controllers\API;

use App\General\Area;
use App\General\City;
use App\General\Country;
use App\General\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        //  ********** Still not send banners and sliders ads ********** //
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }

        $countries = Country::where('active', 1)->get();
        if ($countries->count() > 0) {
            $data = array();
            foreach ($countries as $country) {        /////////////  all countries with related cities with related areas with related zones
                $cities = array();
                if($country->cities){
                    foreach ($country->cities->where('active', 1) as $city) {    ///////// all cities on every country
                        $areas = array();
                        if($city->areas){
                            foreach ($city->areas->where('active', 1) as $area) {   ///////// all areas on every cities
                                $zones = array();
                                if($area->zones){
                                    foreach ($area->zones->where('active', 1) as $zone) {    ///////// all zones on every areas
                                        $zones[] = [
                                            'id' => $zone->id,
                                            'name' => $zone['name_' . $lang],
                                        ];
                                    }
                                }
                                $areas[] = [
                                    'id' => $area->id,
                                    'name' => $area['name_' . $lang],
                                    'zones' => $zones
                                ];
                                $zones = [];
                            }
                        }
                        $cities[] = [
                            'id' => $city->id,
                            'name' => $city['name_' . $lang],
                            'areas' => $areas
                        ];
                        $areas = [];
                    }
                }
                $data[] = [
                    'id' => $country->id,
                    'name' => $country['name_' . $lang],
                    'cities' => $cities,
                ];
                $cities = [];
            }
            return response()->json(['status' => 200, 'data' => $data], 200);
        } else {
            return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }

    public function countries(Request $request)
    {
        //  ********** Still not send banners and sliders ads ********** //
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }

        $records = Country::where('active', 1)->get();
        if ($records->count() > 0) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }

    public function cities(Request $request)
    {
        //  ********** Still not send banners and sliders ads ********** //
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }

        $records = City::where('active', 1)->where('country_id', $request->country_id)->get();
        if ($records->count() > 0) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }

    public function areas(Request $request)
    {
        //  ********** Still not send banners and sliders ads ********** //
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }

        $records = Area::where('active', 1)->where('city_id', $request->city_id)->get();
        if ($records->count() > 0) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }
    public function zones(Request $request)
    {
        //  ********** Still not send banners and sliders ads ********** //
        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }

        $records = Zone::where('active', 1)->where('area_id', $request->area_id)->get();
        if ($records->count() > 0) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400 , 'message' => __('messages.no_data')], 200);
        }
    }
}
