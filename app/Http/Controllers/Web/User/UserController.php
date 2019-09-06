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
        $user_id = Auth::guard('buyer')->id();
        $states = DB::table('state')
        ->whereNull('deleted_at')
        ->get();

        $user = DB::table('seller')
        ->where('id',$user_id)
        ->first();

        $user_details = DB::table('seller_details')
        ->where('seller_id',$user_id)
        ->first();

        $city = null;
        if (!empty($user_details->state_id)) {
            $city = DB::table('city')
            ->where('state_id',$user_details->state_id)
            ->get();
        }
        $user_data = [
            'user' => $user,
            'user_details' => $user_details,
            'city_list' => $city,
        ];
        // dd($states);
    	return view('web.profile.my_profile',compact('states','user_data'));
    }

    public function myProfileUpdate(Request $request)
    {
        $user_id = Auth::guard('buyer')->id();
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dob' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin' => 'required',
        ]);

        $user_update = Seller::where('id',$user_id)
            ->update([
                'name' => $request->input('name'),
            ]);
        $user_profile_update = DB::table('seller_details')
        ->where('seller_id',$user_id)
        ->update([
            'state_id' => $request->input('state'),
            'city_id' => $request->input('city'),
            'address' => $request->input('address'),
            'dob' => $request->input('dob'),
            'pin' => $request->input('pin'),
        ]);

        return redirect()->back()->with('message','Your Profile Has Been Updated Successfully');
    }

    public function changePassword(Request $request)
    {
         $validator = $request->validate([
            'current_pass' => 'required',
            'new_pass' => 'required|same:new_pass',
            'confirm_pass' => 'required|same:new_pass',     
          ]);
    }
}
