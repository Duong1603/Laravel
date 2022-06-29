<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Car extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "decription"=>$this->decription,
            "model"=>$this->model,
            "produced_on"=>$this->produced_on,
            "images"=>"http://localhost:8000/image/".$this->images,
        ];
    }
}