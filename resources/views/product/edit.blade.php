@extends('layouts.design')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.list') }}"> Back</a>
            </div>
        </div>
    </div>
      
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea class="form-control" style="height:150px" name="product_description" placeholder="Description">{{ $product->product_description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Image:</strong>
                    <!-- Display current images -->
                    @foreach (explode(',', $product->product_image) as $image)
                        <img src="/product_image/{{ $image }}" height="100px" width="100px">
                    @endforeach
                    <!-- Allow updating images -->
                    <input type="file" name="product_image[]" class="form-control" placeholder="Image" multiple>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="number" step="0.01" name="product_price" value="{{ $product->product_price }}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
