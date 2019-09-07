<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminDeshboardController extends Controller
{
    public function index(){
    	$total_buyers = DB::table('seller')
    		->whereNull('deleted_at')
    		->where('user_role',1)
    		->count();
    	$total_sellers = DB::table('seller')
    		->whereNull('deleted_at')
    		->where('user_role',2)
    		->count();
    	$total_brands = DB::table('brand_name')
    		->whereNull('deleted_at')
    		->where('status',1)
    		->count();
    	$total_products = DB::table('products')
    		->whereNull('deleted_at')
    		->where('status',1)
    		->count();
    	$last_10_product = DB::table('products')
            ->select('products.*','category.name as c_name','first_category.name as first_c_name','second_category.name as second_c_name','brand_name.name as brand_name')
            ->whereNull('products.deleted_at')
            ->join('category','products.category','=','category.id')
            ->join('first_category','products.first_category','=','first_category.id')
            ->join('second_category','products.second_category','=','second_category.id')
            ->join('brand_name','products.brand_id','=','brand_name.id')
            ->orderBy('products.id','desc')
            ->limit(10)
            ->get();
        $last_10_users = DB::table('seller')
            ->whereNull('deleted_at')
            ->orderBy('id','desc')
            ->limit(10)
            ->get();
        $last_10_Brands = DB::table('brand_name')
        	->select('brand_name.*','category.name as c_name','first_category.name as first_c_name')
            ->whereNull('brand_name.deleted_at')
            ->join('category','brand_name.category','=','category.id')
            ->join('first_category','brand_name.first_category','=','first_category.id')
            ->orderBy('brand_name.id','desc')
            ->limit(10)
            ->get();
    	$data = [
    		'total_buyers'=>$total_buyers,
    		'total_sellers' => $total_sellers,
    		'total_brands' => $total_brands,
    		'total_products' => $total_products,
    		'last_10_product' => $last_10_product,
    		'last_10_users' => $last_10_users,
    		'last_10_Brands' => $last_10_Brands,
    	];
    	return view('admin.admindeshboard',compact('data'));
    }
}
