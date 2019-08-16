<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // 13.1 Transform the api to the service req:
            return [
                'customerName' => $this->customer,
                'review' => $this->review,
                'star' => $this->star
            ];
    }
}
