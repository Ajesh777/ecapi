<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductColleciton extends JsonResource
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
            'productName' => $this->name,
            'discount' => $this->discount . ' %',
            'discountPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
            'rating' => ($this->reviews->count() > 0) ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'Not Rated Yet.',
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
