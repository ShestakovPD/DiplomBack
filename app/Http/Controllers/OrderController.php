<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class OrderController extends Controller
{
    public $product;
    public $order;
    public $orders;

    public function getAllOrder(){

        $email_user=$_POST['email_user'];
        $orders = Order::all()->where('email_user',$email_user);
        $orderb = Order::where('email_user',$email_user)->get(['price'])->toArray();

        /* Получаем цену всего заказа */
            $sum = 0;
            foreach($orderb as $elem=>$val)
                foreach ($val as $w)
                $sum += $w;

        return view('layouts.site', [
            'orders'=>$orders,
            'sum'=>$sum,
        ]);

    }

    public function setUserOrder(){

        $name_prod=$_POST['name_prod'];
        $price=$_POST['price'];
        $id_prod=$_POST['id_prod'];
        $email_user=$_POST['email_user'];
        $img=$_POST['img'];

        $order = new Order();
        $order->name_prod = $name_prod;
        $order->img = $img;
        $order->price = $price;
        $order->id_prod = $id_prod;
        $order->email_user = $email_user;

        $order->save();

        $orders = Order::all()->where('email_user',$email_user);
        $orderb = Order::where('email_user',$email_user)->get(['price'])->toArray();

        /* Получаем цену всего заказа */
        $sum = 0;
        foreach($orderb as $elem=>$val)
            foreach ($val as $w)
                $sum += $w;

        return view('layouts.site', [
            'orders'=>$orders,
            'sum'=>$sum,
        ]);

    }
}

