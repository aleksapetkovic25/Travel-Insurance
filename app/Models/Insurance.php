<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Insurance extends Model
{
    use HasFactory;

     public function addInsurance($request){


        $formFields = $request->validate([
            'carrier.name' => 'required|max:255',
            'carrier.lastname' => 'required|max:255',
            'carrier.number' => 'required',
            'carrier.dateOfBirth' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'type' => 'required',
            'participants.*.name' => 'required|max:255',
            'participants.*.lastname' => 'required|max:255',
            'participants.*.dateOfBirth' => 'required'
        ]);

        $request->startDate = Str::substr($request->startDate,0,10);
        $request->startDate = Str::substr($request->endDate,0,10);
        // $request->carrier['dateOfBirth'] = Str::substr($request->carrier['dateOfBirth'],0,10);

        $newInsurance = DB::table('insurances')
        ->insertGetId([
            'type' => $request->type,
            'usr_name' =>$request->carrier['name'], 
            'usr_lastname' =>$request->carrier['lastname'], 
            'phone' =>$request->carrier['number'], 
            'date_birth' =>date('Y-m-d',strtotime($request->carrier['dateOfBirth'])), 
            'start_date' =>date('Y-m-d',strtotime($request->startDate)), 
            'end_date' =>date('Y-m-d',strtotime($request->endDate))
        ]);
        
        
        for($i=0; $i<count($request->participants); $i++){
            // $request->participants[$i]['dateOfBirth'] = Str::substr($request->participants[$i]['dateOfBirth'],0,10);
           
            DB::table('insurance_participants')
            ->insert([
                'insurance_id' => $newInsurance,
                'usr_name' => $request->participants[$i]['name'],
                'usr_lastname' => $request->participants[$i]['lastname'],
                'date_birth' =>  date('Y-m-d',strtotime($request->participants[$i]['dateOfBirth'])),
            ]);
        }


        return ['message' => 'Successful registration'];
    }
}
