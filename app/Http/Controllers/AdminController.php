<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function getInsurances(Request $request){
        $admin = new Admin();
        $insurances =  $admin->getInsurances($request);
        return view('admin', ['insurances' => $insurances]);
    }
}
