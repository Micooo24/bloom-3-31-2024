@extends('layouts.proddesign')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="menu-section">
    <h2>Products</h2>
    <div class="container"> 
        @foreach ($products as $product)
            <div class="product-card">
                <div class="service">
                    <h3>{{ $product->product_name }}</h3>
                    <div class="image-container" onclick="toggleImage(this)">
                        @php
                            $images = explode(',', $product->product_image);
                        @endphp
                        <img class="mySlides" src="/product_image/{{ $images[0] }}" style="width:100%; height: 200px; object-fit: cover;">
                        @for ($i = 1; $i < count($images); $i++)
                            <img class="mySlides" src="/product_image/{{ $images[$i] }}" style="display: none; width:100%; height: 200px; object-fit: cover;">
                        @endfor
                    </div>
                    <p class="product-description">Description: {{ $product->product_description }}</p>
                    <p>Price: ${{ $product->product_price }}</p>
                </div>
                <!-- Quantity selector -->
                <div class="product-quantity">
                    <button class="product-quantity-btn product-quantity-minus" onclick="decrementQuantity(this)">
                        <span class="product-icon">-</span>
                    </button>
                    <input type="text" name="quantity" maxlength="1" value="1" class="qty">
                    <button class="product-quantity-btn product-quantity-plus" onclick="incrementQuantity(this)">
                        <span class="product-icon">+</span>
                    </button>
                </div>
                <form action="{{ route('order.index') }}" method="get">
                @csrf
                <button class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

</x-app-layout>

<script>
    function toggleImage(container) {
        var images = container.querySelectorAll('.mySlides');
        var visibleIndex = -1;
        for (var i = 0; i < images.length; i++) {
            if (images[i].style.display !== 'none') {
                images[i].style.display = 'none';
                visibleIndex = i;
                break;
            }
        }
        var nextIndex = (visibleIndex + 1) % images.length;
        images[nextIndex].style.display = 'block';
    }
    
    function incrementQuantity(button) {
        var input = button.parentElement.querySelector('.qty');
        var value = parseInt(input.value);
        if (value < 10) { // Ensure maximum value is 10
            input.value = value + 1;
        }
    }
    
    function decrementQuantity(button) {
        var input = button.parentElement.querySelector('.qty');
        var value = parseInt(input.value);
        if (value > 1) { // Ensure minimum value is 1
            input.value = value - 1;
        }
    }
</script>
