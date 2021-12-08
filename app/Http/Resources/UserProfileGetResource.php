<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileGetResource extends JsonResource
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
            'phone' => $this->phone,
            'users_role' => $this->users_role,
            'passport_number' => $this->passport_number,
            'profile_image' => $this->profile_image
        ];
    }
}
