<?php

namespace App\Http\Resources\Api;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Fractalistic\Fractal;
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
            'type' => 'contact',
            'name' => [
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->lasr_name,
                    'preferred' => $this->preferred
                ],
                'email' => $this->email,
                'phone' => $this->phone,
            ];


        //return parent::toArray($request);

        // return Fractal::create()
        //     ->collection($request)
        //     ->transformWith(fn () => [
        //         'title' => $this->title,
        //         'type'=>'contact',
        //         'name' => [
        //             'first_name' => $this->first_name,
        //             'middle_name' => $this->middle_name,
        //             'last_name' => $this->lasr_name,
        //             'preferred' => $this->preferred
        //         ],
        //         'email' => $this->email,
        //         'phone' => $this->phone,
        //     ])
        //     ->toArray();

    }
    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'type' => 'contact',
            ],
        ];
    }
}
