<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Car;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Response;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        // return response()->json($cars, Response::HTTP_OK);
        $cars = Car::all();
        if (count($cars) > 0) {
            return response()->json(["status" =>"200", "success" => true, "count" => count($cars), "data" => $cars]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
        // return $cars;
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
    { {
            $validation = Validator::make(
                $request->all(),
                [
                    'decription' => 'required',
                    'model' => 'required',
                    'produced_on' => 'required|date',
                    'images' => 'mimes:jpeg,jpg,png,gif|max:10000'
                ]
            );

            if ($validation->fails()) {
                $response = array('status' => 'error', 'errors' => $validation->errors()->toArray());
                return response()->json($response);
            }
            //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();

            //kiểm tra file tồn tại
            $name = '';

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('image'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
            }

            $car = new Car();
            $car->decription = $request->decription;
            $car->model = $request->model;
            $car->produced_on = $request->produced_on;
            // $car -> name = $request->name;
            $car->images = $name;
            $car->save();
            if ($car) {
                return response()->json(["status" => "200", "success" => true, "message" => "car record created successfully", "data" => $car]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        {
            $validation = Validator::make(
                $request->all(),
                [
                    'decription' => 'required',
                    'model' => 'required',
                    'produced_on' => 'required|date',
                    'images' => 'mimes:jpeg,jpg,png,gif|max:10000'
                ]
            );

            if ($validation->fails()) {
                $response = array('status' => 'error', 'errors' => $validation->errors()->toArray());
                return response()->json($response);
            }
            //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();

            //kiểm tra file tồn tại
            $name = '';

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('image'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
            }

            $car = Car::find($id);
            $car->decription = $request->decription;
            $car->model = $request->model;
            $car->produced_on = $request->produced_on;
            // $car -> name = $request->name;
            $car->images = $name;
            $car->save();
            if ($car) {
                return response()->json(["status" => "200", "success" => true, "message" => "car record created successfully", "data" => $car]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where('id', $id)->delete();
        return redirect("/cars")->with('status', 'Delete success');
    }

}
