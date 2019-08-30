<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
	public function userRegistrationForm()
	{
		return view('web.user.user_register');
	}

	public function userLoginForm()
	{
		return view('web.user.user_login');
	}
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
            'user_role' => 1,
        ]);


        if ($seller) {
            $seller_id = $seller->id;
            $seller_details = DB::table('seller_details')
            ->insert([
                'seller_id' => $seller_id,
            ]);

        	return redirect()->route('web.userLoginForm')->with('message','Thank You For Registering With Us Please Login To See The Action');
        }else{
        	return redirect()->back()->with('error','Something Went Wrong Please try Again');
        }
    }

    public function myProfileForm()
    {
    	return view('web.profile.my_profile');
    }
}
