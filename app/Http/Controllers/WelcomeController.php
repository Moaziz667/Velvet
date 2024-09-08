<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $topProducts = DB::select(
            'SELECT p.id, p.name, p.description, p.image, p.price, AVG(r.rate) as average_rating
             FROM products p
             JOIN rates r ON p.id = r.product_id
             WHERE p.active = 1
             GROUP BY p.id, p.name, p.description, p.image, p.price
             ORDER BY average_rating DESC
             LIMIT 3'
        );
        return view('welcome', compact('topProducts'));
        
    }
}
