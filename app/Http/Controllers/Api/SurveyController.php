<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{
    public function insert(Request $request)
    {
        if (empty($request->all())) {
            return;
        }

        Survey::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'answers' => json_encode($request->all()),
            ]
        );

        return redirect()->back();
    }
}
