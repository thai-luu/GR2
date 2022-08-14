<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diet;
use App\Models\User;
use App\Models\ModeTarget;

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
        $serving = 0;
        foreach ($input['breakfast'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
           // $trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
            $serving += $value['serving'];
        }
        foreach ($input['dinner'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            //$trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
            $serving += $value['serving'];
        }
        foreach ($input['lunch'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            //$trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
            $serving += $value['serving'];
        }
        foreach ($input['snacks'] as $key =>$value) {
            $carb += $value['carb'] * $value['serving'];
            $protein += $value['protein'] * $value['serving'];
            $fat += $value['fat'] * $value['serving'];
            //$trans += $value['trans'] * $value['serving'];
            $cenluloza += $value['cenluloza'] * $value['serving'];
            $serving += $value['serving'];
        }
        $passCarb = ($carb *100)/$serving;
        $passProtein = ($protein *100)/$serving;
        $passFat = ($fat *100)/$serving;
        $passCenluloza = ($cenluloza *100)/$serving;
        //$passCarb = ($carb *100)/$serving;
        $diet = ModeTarget::where('mode_id',$mode)->where('target_id', $target)->pluck('diet_id')->first();
        $example = Diet::find($diet)->first();
        if(($passCarb - $example->carb) > $example->range)
        $checkCarb = 1;
        else if(($passCarb - $example->carb) < -($example->range))
        $checkCarb = -1;
        else 
        $checkCarb = 0;
        if(($passProtein - $example->protein) > $example->range)
        $checkProtein = 1;
        else if(($passProtein - $example->protein) < -($example->range))
        $checkProtein = -1;
        else 
        $checkProtein = 0;
        if(($passFat - $example->fat) > $example->range)
        $checkFat = 1;
        else if(($passFat - $example->fat) < -($example->range))
        $checkFat = -1;
        else 
        $checkFat = 0;
        if(($passCenluloza - $example->cenluloza) > $example->range)
        $checkCenluloza = 1;
        else if(($passCenluloza - $example->cenluloza) < -($example->range))
        $checkCenluloza = -1;
        else 
        $checkCenluloza = 0;
        // if(($passCenluloza - $example->cenluloza) > $example->range)
        // $checkCarb = 1;
        // else if(($passCarb - $example->carb) < -($example->range))
        // $checkCarb = -1;
        // else 
        // $checkCarb = 0;
        $response = ['carb' => $checkCarb, 'protein' => $checkProtein, 'fat' => $checkFat, 'cenluloza' => $checkCenluloza, 'check' => $passCarb, 'serving' =>$serving];
        ddh($response);
        
    }
}
