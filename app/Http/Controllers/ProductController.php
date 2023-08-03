<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with('media', 'category', 'tags')
            ->where('slug', $slug)
            ->withCount('media','approvedReviews')
            ->withAvg('approvedReviews', 'rating')
            ->active()
            ->hasQuantity()
            ->firstOrFail();


        return view('frontend.product.show', compact('product'));
    }
}
