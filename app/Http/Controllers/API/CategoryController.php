<?php

namespace App\Http\Controllers\API;

use App\General\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index(Request $request)
    {

        //  ********** Still not send banners and sliders ads ********** //

        $lang = 'ar';
        if ($request->headers->has('lang')) {
            $lang = $request->header('lang');
        }
        $categories = Category::where('parent_id', 0)->where('active', 1)->get();
        if ($categories->count() > 0) {
            $data = array();
            foreach ($categories as $category) {
                $subs = array();
                $subCategories = Category::where('parent_id', $category->id)->where('active', 1)->get();
                foreach ($subCategories as $subCategory) {
                    $subsubCategories = Category::where('parent_id', $subCategory->id)->where('active', 1)->get();
                    foreach ($subsubCategories as $sunsubCategory) {
                        $subsub[] = [
                            'id' => $sunsubCategory->id,
                            'name' => $sunsubCategory['name_' . $lang],
                            'products_num' => $sunsubCategory->companies->count(),
                        ];
                    }
                    $subs[] = [
                        'id' => $subCategory->id,
                        'name' => $subCategory['name_' . $lang],
                        'sub_sub_categories' => $subsub,
                    ];
                    $subsub = [];
                }
                $data[] = [
                    'id' => $category->id,
                    'name' => $category['name_' . $lang],
                    'sub_categories' => $subs,
                ];
                $subs = [];
            }
            return response()->json(['status' => 200, 'data' => $data], 200);
        } else {
            return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
        }
    }

    public function categories()
    {
        $records = Category::where('parent_id', 0)->where('active', 1)->get();
        if ($records) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
        }
    }

    public function subcategories(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 500, 'error' => __('messages.validate_error'), 'message' => $validator->messages()], 200);
        }
        
        $records = Category::where('parent_id', $request->category_id)->where('active', 1)->get();
        if ($records) {
            return response()->json(['status' => 200, 'data' => $records], 200);
        } else {
            return response()->json(['status' => 400, 'message' => __('messages.no_data')], 200);
        }
    }
}
