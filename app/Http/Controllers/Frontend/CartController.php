<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $serviceId = $request->input('service_id');
        $serviceName = $request->input('service_name');
        $servicePrice = $request->input('service_price');

        $service = [
            'id' => $serviceId,
            'name' => $serviceName,
            'price' => $servicePrice,
            'quantity' => 1
        ];
        $cart = session()->get('cart', []);
        $serviceExists = false;
        foreach ($cart as $item) {
            if ($item['id'] == $serviceId) {
                $serviceExists = true;
                break;
            }
        }
        if ($serviceExists) {
            return response()->json(['message' => 'Item is already in the cart']);
        }
        $cart[] = $service;
        session(['cart' => $cart]);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        session(['subtotal' => $subtotal]);
        $total = $subtotal;
        session(['total' => $total]);

        return response()->json([
            'message' => 'Service added to cart',
            'cartTotalsHtml' => view('frontend.components.cart.cart_total')->render(),
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $serviceId = $request->input('service_id');
        $cart = session()->get('cart', []);

        $itemRemoved = false;
        foreach ($cart as $index => $item) {
            if ($item['id'] == $serviceId) {
                array_splice($cart, $index, 1);
                $itemRemoved = true;
                break;
            }
        }

        if ($itemRemoved) {
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            session(['subtotal' => $subtotal]);
            $total = $subtotal;
            session(['total' => $total]);
            session(['cart' => $cart]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }



    public function cartOrderPlace(Request $request)
    {
        if (Auth::check()) {
            $userInfo = Auth::user();
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $userInfo = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
        }
        return view('frontend.checkout', compact('userInfo'));
    }


    public function cartCheckoutPage($orderId)
    {
        $order = Order::with('items')->find($orderId);
        return view('frontend.checkout', compact('order'));
    }

    public function orderCheckoutConfirm(Request $request)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment =  Charge::create([
            'amount' => 100 * $request->amount,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            "description" => "This payment is tested purpose",
        ]);

        if ($payment->status === 'succeeded') {

            if (Auth::check()) {
                $user = Auth::user();
            } else {
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->type = 'customer';
                $user->password = bcrypt($request->input('password'));
                $user->save();
                Auth::login($user);
            }

            $cart = session()->get('cart', []);
            $total = session('total');

            $latestOrder = Order::latest('id')->first();
            if ($latestOrder) {
                $orderNumber = intval(substr($latestOrder->order_number, 4)) + 1;
            } else {
                $orderNumber = 1;
            }
            $formattedOrderNumber = 'ord-' . str_pad($orderNumber, 6, '0', STR_PAD_LEFT);

            $order = new Order;
            $order->order_number = $formattedOrderNumber;
            $order->user_id = $user->id;
            $order->total_amount = $request->amount;
            $order->order_type = 'customer';
            $order->payment_status = true;
            $order->payment_method = 'stripe';
            $order->paid_at = Carbon::now();
            $order->save();

            foreach ($cart as $item) {
                $orderItem = new OrderItem([
                    'order_id' => $order->id,
                    'service_id' => $item['id'],
                ]);
                $orderItem->save();
            }

            session()->forget('cart');
            session()->forget('subtotal');
            session()->forget('total');

            return redirect()->route('customer.account');
        }

    }
}
