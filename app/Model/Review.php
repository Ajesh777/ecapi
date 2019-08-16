<?php

namespace App\Model;
// 8.1 Import Product Model:
use App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // 8.2 Create Review Product Relationship:
        public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
