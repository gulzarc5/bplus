<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    public function appLoaddata()
    {
    	$main_category = DB::table('category')
    	->whereNull('deleted_at')
    	->where('status',1)
    	->get();

        $app_slider_list = DB::table('slider')
        ->whereNull('deleted_at')
        ->where('status',1)
        ->where('type',1)
        ->get();

        $popular_products = DB::table('products')
        ->whereNull('deleted_at')
        ->where('status',1)
        ->inRandomOrder()
        ->limit(10)
        ->get();

        $new_arrivals = DB::table('products')
        ->whereNull('deleted_at')
        ->where('status',1)
        ->latest('id')
        ->limit(10)
        ->get();


    	$data = [
    		'main_category_list' => $main_category,
            'sliders' => $app_slider_list,
            'popular_products' => $popular_products,
            'new_arrivals' => $new_arrivals,
    	];

        $response = [
            'status' => true,
            'message' => 'data lists',
            'data' => $data,
        ];
    	
    	return response()->json($response, 200);

    }

    public function sliderImage($image_name)
    {
        $path =  public_path('images/slider/').$image_name;

        if (file_exists($path)) {
            $mime = \File::mimeType($path);

            header('Content-type: '.$mime);

            return readfile($path);
        }else{
            return 0;
        }        
    }

    public function sliderImageThumb($image_name)
    {
        $path =  public_path('images/slider/thumb/').$image_name;

        if (file_exists($path)) {
            $mime = \File::mimeType($path);

            header('Content-type: '.$mime);

            return readfile($path);
        }else{
            return 0;
        }        
    }
}
