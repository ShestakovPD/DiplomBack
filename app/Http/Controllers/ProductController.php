<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public $product;
	public $category;

	public function getAllProduct(){

		$product = Product::all();

		/*dd($product); */

		return view('home', ['product'=>$product]);

	}

		public function getCategoryProduct($category){

		$this->category=$category;

		$product = Product::all();
		$product = $product->where('categ_id', $this->category);

		return view('home', [
			'product'=>$product,
		]);
	}

    public function getOneProduct($id){

        $this->id=$id;

        $product_id = Product::all();
        $product_id = $product_id->where('id', $this->id)->toArray();

       /* var_dump($product_id);
        die;*/

        return view('home', [
            'product_id'=>$product_id,
        ]);
    }
}
