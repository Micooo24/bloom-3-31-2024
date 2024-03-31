
@extends('layouts.design') 



<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    
    
    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products CRUD</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Images</th>
            <th>Product Price</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td> 
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_description }}</td>
            <td>
                <div id="carousel{{ $product->id }}" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        @foreach (explode(',', $product->product_image) as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="/product_image/{{ $image }}" class="d-block w-100" alt="Image {{ $key + 1 }}" style="width: 100px; height: 100px;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel{{ $product->id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                    </a>
                    <a class="carousel-control-next" href="#carousel{{ $product->id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        
                    </a>
                </div>
            </td>
            <td>{{ $product->product_price }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">    
                    <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Add Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</x-app-layout>
