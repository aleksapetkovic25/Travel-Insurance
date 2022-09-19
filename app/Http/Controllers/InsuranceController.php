<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;

class InsuranceController extends Controller
{
    public function addInsurance(Request $request){
        $insurance = new Insurance();
        return $insurance->addInsurance($request);
    }
}
