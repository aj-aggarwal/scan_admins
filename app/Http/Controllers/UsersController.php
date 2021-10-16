<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email',
    		'mobile' => 'required',
    		'address' => 'required'
    	]);

        $user = User::where('mobile', $request->mobile)->first();

        if(!$user) {
            $user = new User;
        }
        
    	$user->first_name = $request->first_name ?? '';
    	$user->last_name = $request->lastname ?? '';
    	$user->password = $request->password ?? '';
    	$user->state_id = $request->state_id ?? 1;
        
        $user->save();

    	return response()->json([
    		'message' => 'User data saved successfully'
    	]);
    }
}
