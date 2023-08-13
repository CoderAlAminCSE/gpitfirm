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
        $servicePrice = floatval($request->input('service_price'));

        $cart = session()->get('cart', []);

        $serviceIndex = array_search($serviceId, array_column($cart, 'id'));

        if ($serviceIndex !== false) {
            // Service already exists, update quantity
            $cart[$serviceIndex]['quantity']++;
        } else {
            // Service doesn't exist, add it to the cart
            $cart[] = [
                'id' => $serviceId,
                'name' => $serviceName,
                'price' => $servicePrice,
                'quantity' => 1
            ];
        }

        // Update session cart
        session(['cart' => $cart]);

        // Calculate new totals
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $total = $subtotal;

        session(['subtotal' => $subtotal, 'total' => $total]);

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
