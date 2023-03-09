<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd(__DIR__.'/secrets/oauth');
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
    //     if (auth()->attempt($data)) 
    //     {
    //         $success['token'] =  $user->createToken('my-token'); 
    //         $success['token'] = $success['token']->plainTextToken;
    //         // $token = auth()->user()->createToken('My-App')->accessToken;
    //         // return response()->json(['token' => $token], 200);
    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message' => "User Login successfully",
    //                 // 'data' => $user,
    //                 'token' => $token,
    //                 'stauts_code' => '200'
    //             ],
    //         );
    //     } 
    // dd($request->all());
        if(Auth::attempt($data))
        { 
            dd('ddd');
            $user_id = auth('sanctum')->user()->id;
            $user = (new User())->find($user_id); 
            $success['token'] =  $user->createToken('my-token'); 
            $success['token'] = $success['token']->plainTextToken;
            $success['name'] =  $user->name;
            $success['user']  = $user;
            return response()->json(
                [
                    'status' => true,
                    'message' => "User login successfully",
                    'data' => $user,
                    'token' =>   $success['token'],
                    'stauts_code' => '200'
                ],
            );
        } 
        else 
        {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
}
