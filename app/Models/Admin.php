<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public function getInsurances($request){

        $insurances = DB::table('insurances')
        ->leftJoin('insurance_participants', 'insurances.id', '=', 'insurance_participants.insurance_id')
        ->get();

        return $insurances;
    }

}
