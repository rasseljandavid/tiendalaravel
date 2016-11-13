<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ecommerce\Supplier;

class SuppliersController extends Controller
{

    public function suppliers() {

        $suppliers = Supplier::all();
 
        return view('suppliers.index', compact('suppliers')); 
    }

    public function show( $slug )
    {
        $supplier = Supplier::with('products')->fromSlug($slug)->first();
      
        if(!$supplier){
            return 'product do not exists';
        }

        // return $product;
        return view('suppliers.show', compact('supplier'));
    }

    
}
