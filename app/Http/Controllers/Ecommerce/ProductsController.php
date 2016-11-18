<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// models
use App\Models\Ecommerce\Product;

class ProductsController extends Controller
{

    public function __construct(  ){
        
        $this->middleware('admin', ['only'=> ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check() || !Auth::user()->isAdmin()){
            return redirect(url('/'));
        }

        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check() || !Auth::user()->isAdmin()){
            return redirect(url('/'));
        }

        return 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $slug )
    {
        $product = Product::with('supplier','categories')->fromSlug($slug)->first();

        $p = new product;
        $featured = [];
        $featured['bestseller'] = $p->getBestSellerProduct();
        $featured['special'] = $p->getSpecialProduct();
        $featured['relatedproducts'] = Product::all()->random(10);
        
        if(!$product){
            return 'product do not exists';
        }

        // return $product;
        return view('products.show', compact('product','featured'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function relatedProducts() {
    //     set_time_limit(120); //60 seconds = 1 minute
    //     $products = Product::withoutGlobalScopes()->get();
    //     foreach ($products as $key => $value) {
    //         $p = Product::withoutGlobalScopes()->get()->where('id', '!=' , $value->id)->random(10);
    //         foreach ($p as $key => $values) {
    //             \DB::table('related_products')->insert(
    //                 array('related_products_id' => $values->id, 'product_id' => $value->id, 'dynamic' => 0)
    //             );
    //         }
    //     }
    // }
    // public function bestsellerProduct() {
    //     $product = \DB::table('orderitems')->select('product_id', \DB::raw('COUNT(product_id) as pid_count'))->groupBy('product_id')->havingRaw('COUNT(product_id) > 0')->orderBy('pid_count', 'desc')->get();
    //     foreach ($product as $key => $value) {
    //  
    public function bestsellerProduct() {
        $product = \DB::table('orderitems')->select('product_id', \DB::raw('COUNT(product_id) as pid_count'))->groupBy('product_id')->havingRaw('COUNT(product_id) > 0')->orderBy('pid_count', 'desc')->get();
        foreach ($product as $key => $value) {
            $product =  Product::find($value->product_id);
            $product->is_bestseller = 1;
            $product->save();
        }
    }
}
