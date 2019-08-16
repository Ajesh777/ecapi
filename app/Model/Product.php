<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 19.1 Auth fillable feilds:
        protected $fillable = [
            'name','detail','stock','price','discount'
        ];

    // 7.1 Create Product Review Relationship:
        public function reviews()
        {
            return $this->hasMany(Review::class);
        }
}
