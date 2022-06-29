<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TtController extends Controller
{
    public function tinhtoan (Request $req){
        $validated = $req->validate ([
            'a'=>'required|numeric',
            'b'=>'required|numeric' 
        ],[
            'a.required' => 'chua nhap a',
            'b.required' => 'chua nhap b',
            'a.numeric' => 'a la 1 so ',
            'b.numeric' => 'b la 1 so ',
        ]);
        $a=$req->input('a');
        $b=$req->input('b');
        $check=$req->input('option');
        $kq ="";  
        switch ($check) {
            case "+":
                $kq = $a+$b;
                break;
            case "-":
                $kq = $a-$b;

                break;
            case "*":
                $kq = $a*$b;

                break;
            case "/":
                $kq = $a/$b;

                break;
            
            default:
                echo "Số nằm ngoài phạm vi";
                break;
        }
        return view('tinhToan',compact('a','b','kq'));

    }
}