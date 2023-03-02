<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
             'reference_no'  => $this->reference_no,
             'price'         => $this->price,
             'quantity'      => $this->quantity,
             'payment_amount'=> $this->payment_amount,
             'product_id'    => $this->product_id,
         ];
     }
}
