<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use PDF;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $product_count = Product::count();


        return view('admin.dashboard', compact('product_count'));
    }
    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function exportPdf()
    {
        $products = Product::all();

        $pdf = PDF::loadView('admin.export_pdf', compact('products'));

        return $pdf->download('products.pdf');
    }
}
