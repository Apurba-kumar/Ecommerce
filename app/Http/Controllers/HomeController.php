<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Stripe;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }
    public function product_detail($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $product = product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            // $cart->rate = $product->price;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity ;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;


            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart= Cart::where('user_id','=',$id)->get();
            return view('home.show_cart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id){

        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','Cart product deleted successfully');

      }

      public function cash_order(){
        $user= Auth::user();

        $userid= $user->id;

        $data = Cart::where('user_id', '=',$userid)->get();

        foreach($data as $data)
        {
            $order= new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->User_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back()->with('message','We have received you order. We will contect with you soon!');
      }

      public function stripe($totalprice){

        return view('home.stripe', compact('totalprice'));
      }

      public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment!"
        ]);

        $user= Auth::user();

        $userid= $user->id;

        $data = Cart::where('user_id', '=',$userid)->get();

        foreach($data as $data)
        {
            $order= new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->User_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message','Payment sucessful!');


    }
}
