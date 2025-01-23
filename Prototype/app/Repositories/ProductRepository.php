<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * Get all products or paginate based on authentication status.
     */
    public function getAllProducts($paginate = false)
    {
        return $paginate ? Product::paginate(5) : Product::all();
    }

    /**
     * Store a new product.
     */
    public function storeProduct(array $data)
    {
        return Product::create($data);
    }

    /**
     * Delete a product.
     */
    public function deleteProduct(Product $product)
    {
        return $product->delete();
    }
}
