<?php

namespace App\Http\Controllers;

use App\Models\CVBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CVBuilderController extends BaseController
{
    public function store(Request $request)
    {
        // dd(auth('sanctum')->user());
        $cv = new CVBuilder();
        // $cv->user_id = auth('sanctum')->user()->id;
        $cv->user_id = 1;
        $cv->work_experience = $request->input('work_experience') ?? '';
        $cv->education = $request->input('education') ?? '';
        $cv->skills = $request->input('skills') ?? '';
        $cv->other_info = $request->input('other_info') ?? '';
        $cv->save();
        // return 
        return $this->sendResponse($cv,'CV Created Successfully.');

    }
}
