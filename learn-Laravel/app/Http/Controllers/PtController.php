<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PtController extends Controller
{
    public function giaiptb1 ( Request $req){
        $validated = $req->validate ([
            'a'=>'required|integer',
            'b'=>'required|integer'
        ],[
            'a.required' => 'chua nhap a',
            'b.required' => 'chua nhap b',
            'a.integer' => 'a la so nguyen',
            'b.integer' => 'b la so nguyen',
        ]);

        // $validator = Validator::make($req->all(), [
        //     'a'=>'required|integer',
        //     'b'=>'required|integer'
        //     ],[
        //         'a.required' => 'chua nhap a',
        //         'b.required' => 'chua nhap b',
        //         'a.integer' => 'a la so nguyen',
        //         'b.integer' => 'b la so nguyen',
        //     ]);
        //     if($validator->fails()){
        //         $errors =$validator->errors();
        //     return view('ptB1')->withErrors($errors);
        //     
        $a = $req->input('a');
        $b = $req->input('b');
        if($a==0)
            if($b==0)
                $kq = "PT có vô số nghiệm";
            else $kq = "PT vô nghiệm";
        else $kq="PT có nghiệm là x= ".round(-$b/$a,2);
        return view('ptB1',compact('a','b','kq'));}
}