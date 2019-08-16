<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 7.1 Create Product Review Relationship:
        public function reviews()
        {
            return $this->hasMany(Review::class);
        }
}
