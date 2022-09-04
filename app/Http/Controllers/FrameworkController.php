<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Framework;

class FrameworkController extends Controller
{
    public function index()
    {
    	return view('framework');
    }

    public function store(Request $request)
    {
 

     $data = $request->except('_token');

     // dd($request->get('name'));
     // $work = [];

     // foreach ($data['name'] as  $value) {
     //     # code...
     // 	$work[]= $value;
     // 	$tss = new Framework;
           
     	// dd($data);

        
     // }

      
 
        $subject_count = count($data['name']);//name[] in select option
        
        for($i=0; $i < $subject_count; $i++)
        {
        	// dd($data[$i]['name']);
            
            $namez = $data['name'][$i];
            $na = $data['name1'];
            $desce = $data['description'];
             $tss = new Framework;
         $tss->name = $namez;
         $tss->cat = $na;
         $tss->description = $desce;  
                // dd($tss);
         $tss->save();
            
         }

             return response()->json($subject_count);
    }
}