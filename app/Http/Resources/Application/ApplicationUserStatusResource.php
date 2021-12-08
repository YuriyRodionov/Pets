<?php

namespace App\Http\Resources\Application;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationUserStatusResource extends JsonResource
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
            "id" => $this->id,
            "address" => $this->address,
            "animal_type_id" => $this->animal_type_id,
            "description" => $this->description,
            "price" => $this->price,
            "status" => $this->status,
            "executor_user_id" => $this->executor_user_id,
            "created_at" => $this->created_at
        ];
    }
}
