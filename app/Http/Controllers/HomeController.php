<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $products = Product::all()->count();

        $order = Order::all()->count();

        $deliver = Order::where('status', 'Delivered')->count();

        return view('admin.index', compact('user', 'products', 'order', 'deliver'));
    }

    public function home()
    {
        $products = Product::all();

        $count = 0;

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $count = Cart::where('user_id', $userId)->count();
        }
        return view('home.index', compact('products', 'count'));
    }

    public function login_home()
    {
        $products = Product::all();

        $count = 0;

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $count = Cart::where('user_id', $userId)->count();
        }


        return view('home.index', compact('products', 'count'));
    }


    public function product_details($id)
    {
        $product = Product::find($id);


        $count = 0;

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $count = Cart::where('user_id', $userId)->count();
        }

        return view('home.product_details', compact('product', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;

        

        $data->save();

        session()->flash('success', 'Product Added to the Cart Successfully!');

        return redirect()->back();

    }

    public function mycart()
    {
       if(Auth::id()){

        $user = Auth::user();
        $userId = $user->id;
        $count = Cart::where('user_id', $userId)->count();
        $cart = Cart::where('user_id', $userId)->get();
       }
       return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::find($id);

    if ($data) { // Periksa apakah $data tidak null
        $data->delete();
        session()->flash('success', 'Product Deleted Successfully!');
    } else {
        session()->flash('The product could not be found');
    }

    return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->receiverName;
        $address = $request->receiverAddress;
        $phone = $request->receiverPhone;

        $userId = Auth::user()->id;

        $cart = Cart::where('user_id', $userId)->get();

        foreach ($cart as $item) {
            $order = new Order;
            $order->user_id = $userId;
            $order->product_id = $item->product_id;
            $order->name = $name;
            $order->receiver_address = $address;
            $order->phone = $phone;
            $order->save();
           
            
            
        }

        $cartRemove = Cart::where('user_id', $userId)->get();

        foreach($cartRemove as $remove){
            $data = Cart::find($remove->id);

            $data->delete();
        }
        session()->flash('success', 'Order Confirmed Successfully!');
        return redirect()->back();

        
        
    }
}
