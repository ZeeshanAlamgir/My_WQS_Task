<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function show($id)
    {
        $user = User::join('c_v_builders','users.id','=','c_v_builders.user_id')->select('users.id','name','email','address','phone_no','profile_picture','c_v_builders.work_experience','c_v_builders.education','c_v_builders.skills','c_v_builders.other_info')->find((int)$id);
        if(isset($user))
        {
            return $this->sendResponse($user,'User Found.');
        }
        else
        {
            return $this->sendError("User Not Found.");
        }

    }
}
