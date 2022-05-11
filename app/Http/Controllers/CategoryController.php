<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public $product;
    public $category;


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
}
