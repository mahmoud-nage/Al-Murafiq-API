<?php

namespace App\Http\Controllers\API;

use App\General\Ad;
use App\Company\Company;
use App\General\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\General\BusinessSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

  private $setting;

  public function __construct()
  {
    $this->setting = BusinessSettings::all();
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {

    $search_count = $this->setting->where('type', 'search_count')->first()->value;
    $search_count = $search_count ? $search_count : 9;

    if ($request->has('category_id') && $request->category_id) {
      $cat = Category::find($request->category_id);
      if ($cat) {
        $records = $cat->companies->paginate($search_count);
      }
    } else {
      $records = Company::paginate($search_count);
    }
    if ($records) {
      return response()->json(['status' => 200, 'data' => $records], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:companies,id',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
    }

    if ($request->has('ad_id') && $request->ad_id) {
      Ad::find($request->ad_id)->increment('visit_count');
    }

    $record = Company::with('reviews')->where('id', $request->id)->first();
    $record->increment('visit_count');
    if ($record) {
      return response()->json(['status' => 200, 'data' => $record], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }

  public function ads(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:companies,id',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
    }

    $record = Company::find($request->id);
    if ($record->ads) {
      return response()->json(['status' => 200, 'data' => $record->ads], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }

  public function subscriptions(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:companies,id',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
    }

    $record = Company::find($request->id);
    if ($record->CompanySubsriptions) {
      foreach ($record->CompanySubsriptions as $CompanySubsription) {
        $data[] = [
          'price' => $CompanySubsription->price,
          'from' => date('d-m-y', strtotime($CompanySubsription->from)),
          'to' => date('d-m-y', strtotime($CompanySubsription->to)),
          // 'days' => $days,
          'slider_num' => $CompanySubsription->slider_num,
          'banner_num' => $CompanySubsription->banner_num,
          'name_en' => $CompanySubsription->subscription->name_en,
          'name_ar' => $CompanySubsription->subscription->name_ar,
        ];
      }
      return response()->json(['status' => 200, 'data' => $data], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }

  public function requestSpecialAdd(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required|exists:companies,id',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
    }

    $record = Company::find($request->id);
    if ($record->CompanySubsriptions) {
      return response()->json(['status' => 200, 'data' => $record->CompanySubsriptions], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
  }

  public function newBranch(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'company_id' => 'required|exists:companies,id',
      'name_ar' => 'required',
      'name_en' => 'required',
      'desc_ar' => 'required',
      'desc_en' => 'required',
      'service_ar' => 'required',
      'service_en' => 'required',
      'address_ar' => 'required',
      'address_en' => 'required',
      'open_from' => 'required|date',
      'open_to' => 'required|date',
      'phone1' => 'required',
      'holiday' => 'required',
      'image' => 'required|mimes:jpg,jpeg,png,tiff,gif',
      // 'pdf' => 'mimes:pdf',
      'email' => 'string|email|max:191',
      'country_id' => 'required|exists:countries,id',
      'city_id' => 'required|exists:cities,id',
      'area_id' => 'required|exists:areas,id',
      'zone_id' => 'required|exists:zones,id',
    ]);

    if ($validator->fails()) {
      return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
    }

    $company = Company::find($request->company_id);
    if ($company) {
      $record = Company::create([
        'name_ar' => $request->name_ar,
        'name_en' => $request->name_en,
        'desc_ar' => $request->desc_ar,
        'desc_en' => $request->desc_en,
        'service_ar' => $request->service_ar,
        'service_en' => $request->service_en,
        'address_ar' => $request->address_ar,
        'address_en' => $request->address_en,
        'open_from' => $request->open_from,
        'open_to' => $request->open_to,
        'phone1' => $request->phone1,
        'holiday' => $request->holiday,
        'email' => $request->email,
        'closed_reason' => $request->closed_reason,
        'parent_id' => $company->id,
        'phone2' => $request->phone2,
        'tel' => $request->tel,
        'fax' => $request->fax,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'twitter' => $request->twitter,
        'snapshat' => $request->snapshat,
        'whatsapp' => $request->whatsapp,
        'googleplus' => $request->googleplus,
        'linked_in' => $request->linked_in,
        'website' => $request->website,
        'lat' => $request->lat,
        'lon' => $request->lon,
        'app' => 1,
        'country_id' => $request->country_id,
        'city_id' => $request->city_id,
        'area_id' => $request->area_id,
        'zone_id' => $request->zone_id,
      ]);

      if ($request->hasFile('image')) {
        $path = 'uploads/companies/image';
        $name = webpUploadImage($request->image, $path);
        $record->image = $name;
        $record->save();
      }
      if ($request->hasFile('pdf')) {
        $path = 'uploads/companies/pdf';
        $name = webpUploadImage($request->avatar, $path);
        $record->pdf = $name;
        $record->save();
      }
      $company->increment('branch_num');
      return response()->json(['status' => 200, 'message' => __('messages.success_branch')], 200);
    }
    return response()->json(['status' => 400, 'message' => __('messages.wrong')], 200);
  }
}
