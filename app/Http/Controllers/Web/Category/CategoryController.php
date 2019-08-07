<?php

namespace App\Http\Controllers\Web\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
    	$category = DB::table('category')->whereNull('deleted_at')->where('status',1)->get();

    	foreach ($category as $key => $value) {
    		$first_category 
    	}
    }
}
