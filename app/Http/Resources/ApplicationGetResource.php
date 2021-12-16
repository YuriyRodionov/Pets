<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationGetResource extends JsonResource
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
            'user_id' => $this->user,
            "address" => $this->address,
            "animal_type_id" => $this->animal_type_id,
            "description" => $this->description,
            "price" => $this->price,
            "status" => $this->status,
            "executor_user_id" => UserGetResource::collection($this->userExecutor),
            "created_at" => $this->created_at,
        ];
    }
}
