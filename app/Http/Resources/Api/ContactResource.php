<?php

namespace App\Http\Resources\Api;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)  : array|Arrayable|JsonSerializable
    {

        return [ 
            'title' => $this->title,
            'name' => [
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->lasr_name,
                    'preferred' => $this->preferred
                ],
                'email' => $this->email,
                'phone' => $this->phone,
            ];

    }

}
