<?php

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Supplier;
use App\Models\Ecommerce\Category;

class TiendaInventory {

	public static function updateTiendaSuppliers() {
		$megaventory = new \Megaventory();

		$suppliers = $megaventory->getSuppliers();

        foreach($suppliers as $supplier) {

            $sup = Supplier::find($supplier->SupplierClientID);

            if(empty($sup)) {
                $newSupplier = new Supplier();
                $newSupplier->id    = $supplier->SupplierClientID;
                $newSupplier->title = $supplier->SupplierClientComments;
                $newSupplier->slug  = $supplier->SupplierClientComments;
                $newSupplier->save();
            } else {
                $sup->title = $supplier->SupplierClientComments;
                $sup->slug  = $supplier->SupplierClientComments;
                $sup->update();
            }   
        }
        return;
	} 

    public static function updateTiendaCategories() {

        $megaventory = new \Megaventory();
        $categories = $megaventory->getCategories();

        foreach($categories as $category) {
            if($category->ProductCategoryDescription >= 0) { // < 0 are cat that currently inactive
                
                $cat = Category::find($category->ProductCategoryID);

                if(empty($cat)) { 
                    $newCategories = new Category();
                    $newCategories->id = $category->ProductCategoryID;
                    $newCategories->title = $category->ProductCategoryName;
                    $newCategories->rank = $category->ProductCategoryDescription;
                    $newCategories->slug = $category->ProductCategoryName;
                    $newCategories->save();
                } else {
                    $cat->title = $category->ProductCategoryName;
                    $cat->rank  = $category->ProductCategoryDescription;
                    $cat->slug  = $category->ProductCategoryName;
                    $cat->update();
                }
            }
        }

        return;
    } 

	public static function updateTiendaProducts() {
		$megaventory = new \Megaventory();

		$products = $megaventory->getProducts();
        foreach($products as $product) {

            $is_featured = 0;
            $is_special  = 0;
            $is_bestSeller = 0;
            $rank = 0;
           
            if(strtolower(trim($product->ProductCustomField2)) == 'featured') {
                $is_featured = 1;
            }

            if(strtolower(trim($product->ProductCustomField2)) == 'special') {
                $is_special = 1;
            }

            if(strtolower(trim($product->ProductCustomField2)) == 'bestseller') {
                $is_bestSeller = 1;
            }

            if(!empty($product->ProductCustomField3)) {
                $rank = (int)$product->ProductCustomField3;
            }

            
            $prod = Product::withoutGlobalScopes()->find($product->ProductID);
            //If new product
            if(empty($prod)) {
                $newProduct = new Product();
                $newProduct->id = $product->ProductID;
                $newProduct->supplier_id = $product->ProductMainSupplierID;
                $newProduct->sku = $product->ProductSKU;
                $newProduct->title = $product->ProductDescription;
                $newProduct->slug = $product->ProductDescription;
                $newProduct->price = $product->ProductSellingPrice * 1.1;
                $newProduct->salePrice = $product->ProductSellingPrice;
                $newProduct->save();

                $newProduct->categories()->attach($product->ProductCategoryID, ['rank' => 0]);
            } else {

                $prod->is_featured   = $is_featured;
                $prod->is_special    = $is_special;
                $prod->is_bestSeller = $is_bestSeller;
                $prod->rating        = rand(3,5);
                $prod->rank          = $rank;
                $prod->title         = $product->ProductDescription;
                $prod->body          = $product->ProductLongDescription;
                $prod->price         = $product->ProductSellingPrice * 1.1;
                $prod->salePrice     = $product->ProductSellingPrice;
                $prod->update();
            }
        }
	}

	public static function updateTiendaInventory() { 
		$meg = new \Megaventory();
        $inv = $meg->getInventory();
        foreach($inv as $item) {
            DB::update("UPDATE products SET quantity = $item->StockPhysicalTotal where id = {$item->productID}");
        }
	}
}
	