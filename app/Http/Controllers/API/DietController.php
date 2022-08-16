<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Diet;
use App\Models\ModeTarget;

class DietController extends Controller
{
    public function recomended(Request $request)
    {
        $user = $request->user();
        $mode = ModeTarget::where('target_id', $user->target_id)->where('mode_id', $target->mode_id)->first();
        $diet = Diet::where('id', $mode->diet_id);
    }
}
