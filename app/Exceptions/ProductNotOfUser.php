<?php

namespace App\Exceptions;

use Exception;

class ProductNotOfUser extends Exception
{
    // 26.1 Render exception:
        public function render()
        {
            return ['errors' => 'Product Not of User'];
        }
}
