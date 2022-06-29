<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PtController;
use App\Http\Controllers\TtController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('ptB1', function () {
    return view('ptB1');
});

// Route::post('ptB1',function(Request $req){
//     $a =$req->input('a');
//     $b =$req->input('b');
//     if($a==0)
//         if($b==0)
//             $kq = "PT có vô số nghiệm";
//         else $kq = "PT vô nghiệm";
//     else $kq="PT có nghiệm là x= ".round(-$b/$a,2);
//     return view('ptB1',compact('a','b','kq'));
// })->name('ptB1.post');

Route::post('ptB1',[PtController::class,'giaiptb1'])->name('ptB1.post');


Route::get('tinhToan', function () {
    return view('tinhToan');
});

Route::post('tinhToan',[TtController::class,'tinhtoan'])->name('tinhToan.post');


Route::resource('cars',CarController::class);
Route::get('{id}/Edit', [CarController::class, "edit"]);
Route::put('/Update/{id}', [CarController::class, "update"]);
Route::get('/Delete/{id}', [CarController::class, "delete"]);
Route::get("/Create", [CarController::class, "create"]);
Route::post("/Store", [CarController::class, "store"]);
// tương đương với các route sau
//Route::get('cars',[CarController::class],'index')->name('cars.index');
// Route::get('cars/create',[CarController::class,'create'])->name('cars.create');
// Route::post('cars',[CarController::class,'store'])->name('cars.store');
// Route::get('cars/{car}',[CarController::class,'show'])->name('cars.show');
// Route::get('cars/{car}/edit',[CarController::class,'edit'])->name('cars.edit');
// Route::put('cars/{car}',[CarController::class,'update'])->name('cars.update');
// Route::delete('cars/{car}',[CarController::class,'destroy'])->name('cars.destroy');