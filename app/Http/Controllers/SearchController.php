<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchResults(Request $request)
    {
        $searchTerm = $request->input('search_term');
        $sortBy = $request->input('sort_by', 'price');
        $orderBy = $request->input('order_by', 'asc');

        $query = Product::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $query->orderBy($sortBy, $orderBy);

        $products = $query->paginate(10);

        $categories = Category::all();
        $brands = Brand::all();

        return view('customer.search-result', compact(
            'products',
            'categories',
            'brands',
            'searchTerm',
            'sortBy',
            'orderBy'
        ));
    }


}
