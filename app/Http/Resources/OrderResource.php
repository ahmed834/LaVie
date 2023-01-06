<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // 'id',
        // 'name',
        // 'the_order',
        // 'adress',
        // 'phone',
        //shiping
      
       
        return [

            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'the_order'=>$this->the_order,
            'country'=>$this->country,
            'city'=>$this->city,
            'adress'=>$this->adress,
            'phone'=>$this->phone,
            'shipping'=>$this->shipping,
            

        ];
    }
}
