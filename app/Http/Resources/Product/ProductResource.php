<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 10 Transform the api to the standards & according to the service requirement:  
            return [
                'productName' => $this->name,
                'description' => $this->detail,
                'price' => $this->price,
                'discount' => $this->discount . ' %',
                // 10.1 DiscountPrice:
                'discountPrice' => round((1 - ($this->discount/100)) * $this->price, 2),
                // 10.2 Msg If out of Stock:
                'stock' => ($this->stock == 0) ? 'Out Of Stock' : $this->stock,
                // 10.3 Create Review link:
                    'href' => [
                        'reviews' => route('reviews.index', $this->id)
                    ],
                // 10.4 Create sum of Rating for the Product from Review table:
                    'rating' => ($this->reviews->count() > 0) ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'Not Rated Yet.'
            ];
    }
}
