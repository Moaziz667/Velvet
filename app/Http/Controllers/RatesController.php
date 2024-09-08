<?php

namespace App\Http\Controllers;

use App\Models\Rates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function setRate(Request $request)
    {
        // Check if the user has already rated this product
        $existingRate = Rates::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingRate) {
            // Update the existing rate
            $existingRate->update([
                'rate' => $request->rate
            ]);
            $res = $existingRate;
        } else {
            // Create a new rate entry
            $res = Rates::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'rate' => $request->rate
            ]);
        }
        $total  = round( Rates::where('product_id', $request->product_id)->avg('rate'));

        return response()->json($total);
    }
    public function getRate($product_id)
    {
        $rate = round(Rates::where('product_id', $product_id)->avg('rate'));
        $old_rate = Rates::where('product_id', $product_id)->where('user_id', auth()->id())->first();
        return response()->json([
            'rate' => $rate,
            'old_rate' => $old_rate 
        ]);
    }
  
}
