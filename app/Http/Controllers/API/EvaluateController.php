<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diet;
use App\Models\User;
class EvaluateController extends Controller
{
    public function evaluate (Request $request) {
        $input = $request->all();
        $user = $request->user();
        $target = $user->target_id;
        $mode = $user->mode_id;
        $carb = 0;
        $protein = 0;
        $fat = 0;
        $trans = 0;
        $cenluloza = 0;
        foreach ($input['breakfast'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            $trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
        }
        foreach ($input['dinner'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            $trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
        }
        foreach ($input['lunch'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            $trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
        }
        foreach ($input['snacks'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            $trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
        }
        $example = Diet::where('mode_id',$mode)->where('target_id', $target)->get();
        ddh($protein);
    }
}
