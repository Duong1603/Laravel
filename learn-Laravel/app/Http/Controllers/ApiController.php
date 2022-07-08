<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Resources\Car as CarResouces;
use Nette\Utils\Validators;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
    
        return CarResouces::collection($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,jpeg|max:4000',
            ], [
                'image.mimes' => 'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file = $request->file(('image'));
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image');
            $file->move($destinationPath, $name);
        }
        $this->validate($request, [
            'decription' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
        ], [
            'decription.required' => 'Bạn chưa nhập mô tả',
            'model.required' => 'Bạn chưa nhập model',
            'produced_on.required' => 'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' => 'Cột produced_on phải là kiểu ngày!'
        ]);
        $car = new Car();
        $car->decription = $request->decription;
        $car->model = $request->model;
        $car->produced_on = $request->produced_on;
        $car->mf_id = $request->mf_id;
        $car->images = $name;
        $car->save();
        if ($car) {
            return response()->json(["status" => $this->status, "success" => true, "message" => "car record created successfully", "data" => $car]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
        }
        return redirect()->route('cars.index')->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}