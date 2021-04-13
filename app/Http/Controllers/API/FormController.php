<?php

namespace App\Http\Controllers\API;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class FormController extends Controller
{
    // public function index(){
    //     return response()->json([
    //         'messsage'=>'sukses bre'
    //     ],200
    // );
    // }



    public function create(Request $request){

        $request -> validate([
            'nama'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required'
        ]);
        
        // dd($request->all());
        $students = new Students;
        $students->nama = $request->nama;
        $students->alamat = $request->alamat;
        $students->no_hp = $request->no_hp;
        $students->save();

        return response()->json([
            'messsage'=>'sukses menambah murid',
            'data_students'=>$students
        ],200 
    );
    }

}
