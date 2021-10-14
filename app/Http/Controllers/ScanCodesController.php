<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CenterQrCode;
use App\Models\User;

class ScanCodesController extends Controller
{
	protected $centerQrCode;

	public function __construct(CenterQrCode $centerQrCode)
	{
		$this->centerQrCode = $centerQrCode;
	}

    public function scanCode(Request $request)
    {
    	$request->validate([
    		'qr_code' => 'required',
    	]);
    	$qrCode = $request->input('qr_code');
    	$getCode = $this->centerQrCode->where('qr_code', $qrCode)->first();
    	if($getCode){
    		$token = $getCode->createToken('Token Name')->accessToken;
    		return response()->json([
    			'access_token' => $token
    		]);
    	}
    	return response()->json([
    		'message' => 'Invalid qr_code'
    	]);
    }
}
