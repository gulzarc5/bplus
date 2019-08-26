<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function sellerListSecondCategory($second_category,$page)
    {
    	$limit = ($page*10)-10;
    	

    	$products_sellers=DB::table('products')
    	->select('products.seller_id as seller_id', 'seller.name as seller_name')
    	->join('seller','products.seller_id','=','seller.id')
    	->whereNull('products.deleted_at')
    	->where('products.status',1)
    	->where('products.second_category',$second_category)
    	->distinct()
    	->skip($limit)
    	->take(10)
    	->get();

    	$total_rows = clone $products_sellers;
    	$total_rows = $total_rows->count();
		$total_page = ceil($total_rows/10);

		$products = [];

    	foreach ($products_sellers as $products_Seller) {
    		$product_against_seller=DB::table('products')
	    	->whereNull('deleted_at')
	    	->where('status',1)
	    	->where('second_category',$second_category)
	    	->where('seller_id',$products_Seller->seller_id)
	    	->latest('id')
	    	->limit(10)
	    	->get();

            $seller_address = DB::table('seller_details')
            ->select('state.name as state_name','city.name as city_name')
            ->join('state','seller_details.state_id','=','state.id')
            ->join('city','seller_details.city_id','=','city.id')
            ->whereNull('seller_details.deleted_at')
            ->where('seller_details.seller_id',$products_Seller->seller_id)
            ->first();


    		$products[]=[
    			'seller_id' => $products_Seller->seller_id,
                'second_category' => $second_category,
    			'seller_name' => $products_Seller->seller_name,
                'seller_state' => $seller_address->state_name,
                'seller_city' => $seller_address->city_name,
    			'product' => $product_against_seller,
    		];
    	}

    	$response = [
            'status' => true,
            'current_page' =>$page,
            'total_page' =>$total_page,
            'message' => 'Reseller List',
            'data' => $products,

        ];
    	
    	return response()->json($response, 200);

    }


    public function productListSecondCategory($second_category,$seller_id,$page_no)
    {
    	Filter
    	$seller_second_category = DB::table('products')
            ->select('products.seller_id as seller_id','products.second_category as second_category','second_category.name as category_name')
            ->join('second_category','products.second_category','=','second_category.id')
            ->whereNull('products.deleted_at')
            ->where('products.status',1)
            ->where('products.seller_id',$seller_id)
            ->distinct()
            ->get();


    }
}
