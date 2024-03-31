@extends('layouts.design')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.list') }}">Back</a>
            </div>
        </div>
    </div>
      
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                {{ $product->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                {{ $product->product_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Images:</strong>
                <div class="row">
                    @foreach (explode(',', $product->product_image) as $image)
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <img src="{{ asset('product_image/' . $image) }}" class="img-fluid" alt="Product Image" height="100px" width="100px">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                
                {{ $product->product_price }}
            </div>
        </div>
    </div>
@endsection
