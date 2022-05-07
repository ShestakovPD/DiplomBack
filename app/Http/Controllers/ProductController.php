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

		/*dd($product); */

		return view('layouts.site', ['product'=>$product]);

	}

	public function getCategoryProduct($category){

		$this->category=$category;

		$product = Product::all();
        $category_s = Category::all()->where('id',$this->category)->toArray();
        $category_num=$category_s[$category-1]['name'];

		$product = $product->where('categ_id', $this->category);

		return view('layouts.site', [
			'product'=>$product,
			'category_num'=> $category_num,
		]);
	}

    public function getOneProduct($id){

        $this->id=$id;

        $product_id = Product::all()->where('id', $this->id)->toArray();

       /* var_dump($product_id);
        die;*/

        return view('layouts.site', [
            'product_id'=>$product_id,
            'id'=>$id,
        ]);
    }
}
