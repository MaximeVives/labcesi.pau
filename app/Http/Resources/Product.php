<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ID_product' => $this->ID_product,
            'name_product' => $this->name_product,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'url_pic' => $this->url_pic,
        ];
    }
}
