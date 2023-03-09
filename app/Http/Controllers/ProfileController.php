<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Image;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    use Image;
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $path = 'images/';
        try {
            // dd($id);
            $user = User::find((int)$id);
            // dd($user);
            if(isset($user))
            {
                // dd('user',$user);
                $user->address = $request->input('address');
                $user->phone_no = $request->input('phone_number');
                $user->profile_picture = $this->imageStore($path,$request['profile_picture']);
                $user->save();
                return $this->sendResponse($user,'Profile Updated Successfully.');
            }
            else
            {
                return $this->sendError("Unauthorized or User Not Found");
            }

        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
