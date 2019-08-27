<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;
use DB;
use Auth;

class UserController extends Controller
{
    public function userRegistration(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:seller'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' =>  ['required','digits:10','numeric','unique:seller'],
        ]);

        $seller = Seller::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mobile' => $request->input('mobile'),
<<<<<<< HEAD
            'user_role' => 1,
=======
            'user_role' => 2,
>>>>>>> 3e257582ff675430c2b1d26dcc5eb97e59db8605
        ]);


        if ($seller) {

            $seller_id = $seller->id;

            $seller_details = DB::table('seller_details')
            ->insert([
                'seller_id' => $seller_id,
            ]);

<<<<<<< HEAD
        	return redirect()->route('web.user_registration')->with('message','Thank You For Registering With Us Please Login To See The Action');
=======
            $bank_details = DB::table('seller_bank')
            ->insert([
                'seller_id' => $seller_id,
            ]);


        	return redirect()->route('seller_login')->with('message','Thank You For Registering With Us Please Login To See The Action');
>>>>>>> 3e257582ff675430c2b1d26dcc5eb97e59db8605
        }else{
        	return redirect()->back()->with('error','Something Went Wrong Please try Again');
        }
    }
}
