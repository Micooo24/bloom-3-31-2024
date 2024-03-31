@extends('layouts.proddesign')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="menu-section">
        <h2>Products</h2>

        <div class="cart-container">
            <h1>Your Cart</h1>
            <div class="cart-header">
                <div></div>
                <div class="label">Price:</div>
                <div class="label">Quantity:</div>
                <div class="label">Shipping Fee:</div>
                <div class="label">Total:</div>
            </div>
            @foreach ($data_order as $order)
                <div class="cart-row">
                    <div class="cart-item">
                        <h3>{{ $order->product->product_name }}</h3>
                    </div>
                    <div class="cart-details">
                        <div>${{ $order->product->product_price }}</div>
                        <div>${{ $order->quantity }}</div>
                        <div>${{ $order->shipping_fee }}</div>
                        <div>${{ $order->total_price }}</div>
                        <div class="cart-actions">
                            <button class="btn">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="cart-actions">
                <button class="btn">Checkout</button>
            </div>
        </div>
    </div>
</x-app-layout>
