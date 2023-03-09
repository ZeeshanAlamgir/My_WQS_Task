<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends BaseController
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'email_verified_at'=>'date'
        ]);
   
        if($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['email_verified_at'] = Hash::make($input['email_verified_at']);
        $user = User::create($input);
        $success['token'] =  $user->createToken($input['email'])->accessToken;
        $success['token'] =  $user->createToken('my-token'); 
        $success['token'] = $success['token']->plainTextToken;
        $success['name'] =  $user->name;   
        $success['User token'] =  $user->token;   
        return response()->json(
            [
                'status' => true,
                'message' => "User Register successfully",
                'data' => $user,
                'token' => $success['token'],
                'stauts_code' => '200'
            ],
        );
        // zeeshan@gmail.com
        // return $this->sendResponse($success,'User register successfully.');
    }
}
