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

        // Create an array to store the service details
        $service = [
            'id' => $serviceId,
            'name' => $serviceName,
            'price' => $servicePrice,
            'quantity' => 1
        ];

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Check if the service is already in the cart
        $serviceExists = false;
        foreach ($cart as $item) {
            if ($item['id'] == $serviceId) {
                $serviceExists = true;
                break;
            }
        }

        // If the service already exists, show an alert message
        if ($serviceExists) {
            return response()->json(['message' => 'Item is already in the cart']);
        }

        // If the service is not in the cart, add it
        $cart[] = $service;

        // Store the updated cart in the session
        session(['cart' => $cart]);

        return response()->json(['message' => 'Service added to cart']);
    }

    public function removeFromCart(Request $request)
    {
        $serviceId = $request->input('service_id');
        $cart = session()->get('cart', []);

        foreach ($cart as $index => $item) {
            if ($item['id'] == $serviceId) {
                array_splice($cart, $index, 1);
                break;
            }
        }

        session(['cart' => $cart]);
        return response()->json(['success' => true]);
    }
}
