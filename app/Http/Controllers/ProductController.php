<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public $product;
	public $category;

	public function getAllProduct(){

		$product = Product::all();
        $category = Category::all();

		return view('layouts.site', [
            'product'=>$product,
            'category'=> $category,
        ]);

	}

    public function getOneProduct($id){

        $this->id=$id;

        $product_id = Product::all()->where('id', $this->id)->toArray();
        $category = Category::all();

        return view('layouts.site', [
            'product_id'=>$product_id,
            'id'=>$id,
            'category'=> $category,
        ]);
    }
}
