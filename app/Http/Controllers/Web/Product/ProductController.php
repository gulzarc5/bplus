<?php

namespace App\Http\Controllers\Web\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class ProductController extends Controller
{
    public function productSellerWithSecondCategory($second_category)
    {
    	try{
            $second_category = decrypt($second_category);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

    	$products_sellers=DB::table('products')
    	->select('products.seller_id as seller_id', 'seller.name as seller_name')
    	->join('seller','products.seller_id','=','seller.id')
    	->whereNull('products.deleted_at')
    	->where('products.status',1)
    	->where('products.second_category',$second_category)
    	->distinct()
    	->get();

    	

    	$products = [];

    	foreach ($products_sellers as $products_Seller) {
    		$product_against_seller=DB::table('products')
	    	->whereNull('deleted_at')
	    	->where('status',1)
	    	->where('second_category',$second_category)
	    	->where('seller_id',$products_Seller->seller_id)
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

    	return view('web.product.product_saller',compact('products'));
    }

    public function productView($seller_id,$second_category)
    {
        try{
            $seller_id  = decrypt($seller_id);
            $second_category = decrypt($second_category);
        }catch(DecryptException $e) {
            return redirect()->back();
        }


        $products_sellers=DB::table('products')
            ->select('products.seller_id as seller_id', 'seller.name as seller_name')
            ->join('seller','products.seller_id','=','seller.id')
            ->whereNull('products.deleted_at')
            ->where('products.status',1)
            ->where('products.second_category',$second_category)
            ->distinct()
            ->get();

        $seller_second_category = DB::table('products')
            ->select('products.seller_id as seller_id','products.second_category as second_category','second_category.name as category_name')
            ->join('second_category','products.second_category','=','second_category.id')
            ->whereNull('products.deleted_at')
            ->where('products.status',1)
            ->where('products.seller_id',$seller_id)
            ->distinct()
            ->get();


        $products_brands=DB::table('products')
            ->select('brand_name.id as brand_id', 'brand_name.name as brand_name',DB::raw('count(*) as total'))
            ->join('brand_name','products.brand_id','=','brand_name.id')
            ->whereNull('products.deleted_at')
            ->where('products.status',1)
            ->where('products.second_category',$second_category)
            ->distinct()
            ->groupBy('brand_name.id','brand_name.name')
            ->get();

        $product_colors = DB::table('products')
            ->select('color.id as color_id','color.name as color_name','color.value as color_value',DB::raw('count(*) as total'))
            ->join('product_colors','products.id','=','product_colors.product_id')
            ->join('color','product_colors.color_id','=','color.id')
            ->where('products.second_category',$second_category)
            ->distinct('color.id')
            ->groupBy('color.id','color.name','color.value')
            ->get();

        /// Pagination
            $current_page = 1;
            $product_count = DB::table('products')
            ->whereNull('deleted_at')
            ->where('status',1)
            ->where('second_category',$second_category)
            ->where('seller_id',$seller_id)
            ->count();
            $total_page = intval(ceil($product_count / 12 ));
            $limit = ($current_page*12)-12;
        $pagination = [
            'current_page' => $current_page,
            'total_page' => $total_page,
            'total_product' => $product_count,
        ];

        $product_min_max_price = DB::table('products')
            ->select(DB::raw('min(price) as min_price'),DB::raw('max(price) as max_price'))
            ->whereNull('deleted_at')
            ->where('status',1)
            ->where('second_category',$second_category)
            ->where('seller_id',$seller_id)
            ->first();
        // dd($product_min_max_price);

        $product_against_seller=DB::table('products')
            ->whereNull('deleted_at')
            ->where('status',1)
            ->where('second_category',$second_category)
            ->where('seller_id',$seller_id)
            ->skip($limit)
            ->take(12)
            ->get();
         
        $second_category_name = DB::table('second_category')->where('id',$second_category)->first();
        return view('web.product.product_category',compact('seller_second_category','products_sellers','products_brands','product_colors','product_against_seller','second_category_name','pagination','product_min_max_price','seller_id'));
    }

    public function producatFilter(Request $request)
    {
        echo "hi";
    }

    public function productDetails($product_id)
    {
        try{
            $product_id  = decrypt($product_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $product=DB::table('products')
        ->whereNull('products.deleted_at')
        ->where('products.status',1)
        ->where('products.id',$product_id)
        ->first();

        $seller_details = DB::table('seller')
        ->select('seller.name as seller_name','state.name as state_name','city.name as city_name')
        ->join('seller_details','seller.id','=','seller_details.seller_id')
        ->join('state','seller_details.state_id','=','state.id')
        ->join('city','seller_details.city_id','=','city.id')
        ->where('seller.id',$product->seller_id)
        ->first();

        $product_images = DB::table('product_image')
        ->where('product_id',$product_id)
        ->whereNull('deleted_at')
        ->where('status',1)
        ->get();
        $product_color = DB::table('product_colors')
        ->select('product_colors.id as color_id','color.name as color_name','color.value as color_value')
        ->join('color','product_colors.color_id','color.id')
        ->where('product_colors.product_id',$product_id)
        ->where('product_colors.status','1')
        ->whereNull('product_colors.deleted_at')
        ->get();
        // dd(count($product_color));
        
        return view('web.product.product_details',compact('product','seller_details','product_images','product_color'));

    }
}
