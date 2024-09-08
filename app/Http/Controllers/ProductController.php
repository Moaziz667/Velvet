<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\CartRepository;
class ProductController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()
            ->whereActive(true)
            ->get();
            return view('products.index',compact('products'));
    }
    public function indexMen(){

            return view('products.indexM');
    }
    public function indexWomen(){
    
        return view('products.indexW');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }
    public function allProducts(Request $request)
    {
        // Retrieve the search query, option, and sort order from the request
        $searchQuery = $request->input('searchQuery');
        $option = $request->input('option');
        $sort = $request->input('sort', ''); // Default to no sorting
        $gender = $request->input('gender');

        // Build the query
        $query = Product::query();
    
        // Apply the search query filter if it exists
        if (!empty($searchQuery)) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }
    
        // Apply the option filter (e.g., gender) if it exists
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    
        // Apply sorting if it exists
        if ($sort === 'price_c') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_d') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'date_c') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'date_d') {
            $query->orderBy('created_at', 'desc');
        }
    
        // Paginate the results, 8 items per page
        $products = $query->paginate(8);
    
        // Return the paginated products as a JSON response
        return response()->json([
            'products' => $products->items(),  // Get items on the current page
            'total' => $products->total(),     // Total items in the result set
            'last_page' => $products->lastPage(), // Total number of pages
            'current_page' => $products->currentPage(), // Current page number
        ]);
    }
    
    
    
}
