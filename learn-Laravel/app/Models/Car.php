<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mf;

class Car extends Model
{
    use HasFactory;
    protected $table='cars';
    protected $fillable=['model','decription','product_on','images','mf_id'];
    public function mf(){
        return $this->belongsTo(Mf::class,'mf_id','id');
    }
}