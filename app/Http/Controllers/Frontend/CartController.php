<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

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
}
