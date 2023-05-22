@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header"><h1>VIEW PRODUCT</h1></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $product->title }}</h2>
                        <p>Ingredients: {{ $product->ingredients }}</p>
                        <p>Price: {{ $product->price }}</p>
                        <p>SKU: {{ $product->sku }}</p>
                        <p>Quantity: {{ $product->qty }}</p>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection