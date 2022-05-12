<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Notification;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;


class OrderController extends Controller
{
    public $product;
    public $order;
    public $orders;
    public $transport;

    public function getAllOrder()
    {

        $email_user = $_POST['email_user'];
        $orders = Order::all()->where('email_user', $email_user);
        $orderb = Order::where('email_user', $email_user)->get(['price'])->toArray();
        $category = Category::all();

        /* Получаем цену всего заказа */
        $sum = 0;
        foreach ($orderb as $elem => $val) {
            foreach ($val as $w) {
                $sum += $w;
            }
        }

        return view('layouts.site', [
            'orders' => $orders,
            'sum' => $sum,
            'category' => $category,
        ]);

    }

    public function setUserOrder()
    {

        $name_prod = $_POST['name_prod'];
        $price = $_POST['price'];
        $id_prod = $_POST['id_prod'];
        $email_user = $_POST['email_user'];
        $img = $_POST['img'];

        $order = new Order();
        $order->name_prod = $name_prod;
        $order->img = $img;
        $order->price = $price;
        $order->id_prod = $id_prod;
        $order->email_user = $email_user;

        $order->save();

        $orders = Order::all()->where('email_user', $email_user);
        $orderb = Order::where('email_user', $email_user)->get(['price'])->toArray();
        $category = Category::all();

        /* Получаем цену всего заказа */
        $sum = 0;
        foreach ($orderb as $elem => $val) {
            foreach ($val as $w) {
                $sum += $w;
            }
        }

        $this->sendMessage($order);
        return view('layouts.site', [
            'orders' => $orders,
            'sum' => $sum,
            'category' => $category,
        ]);

    }

    public function sendMessage()
    {

        $notif = Notification::get(['host', 'port', 'encryption', 'username', 'password', 'email'])->toArray();
        $host = $notif[0]['host'];
        $port = $notif[0]['port'];
        $encryption = $notif[0]['encryption'];
        $username = $notif[0]['username'];
        $password = $notif[0]['password'];
        $email = $notif[0]['email'];

        try {
            $transport = (new Swift_SmtpTransport("$host", "$port", "$encryption"))
                ->setUsername("$username")
                ->setPassword("$password");

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(["$email" => "$email"])
                ->setTo(["$email"])
                ->setBody('Пользователь сделал заказ')/*->attach(Swift_Attachment::fromPath('test.php'))*/
            ;
            return $mailer->send($message);
            /*   var_dump(['res' => $result]);*/
        } catch (Exception $e) {
            var_dump($e->getMessage());
            echo '<pre>' . print_r($e->getTrace(), 1);
        }
    }

}

