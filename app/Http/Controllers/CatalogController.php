<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function index($slug = null)
    {

        return view('frontend.catalog.index', compact('slug'));
    }

    public function search(Request $request)
    {
        $data = Product::select('slug', 'name')
            ->where('name', 'LIKE', '%'.$request->productName. '%')
            ->take(5)
            ->get();

        return response()->json($data);
    }
}
