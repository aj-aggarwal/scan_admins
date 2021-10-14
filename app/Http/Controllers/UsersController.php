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

    	$payload = $request->all();
    	$payload['first_name'] = $payload['first_name']??'';
    	$payload['last_name'] = $payload['lastname']??'';
    	$payload['username'] = $payload['username']??'';
    	$payload['password'] = $payload['password']??'';
    	$payload['state_id'] = $payload['state_id']??1;

    	if($user = User::where('email', $request->input('email'))->first()){
    		return response()->json([
    			'message' => 'User already exists'
    		]);
    	}
    	User::create($payload);

    	return response()->json([
    		'message' => 'User created successfully'
    	]);
    }
}
