@extends('app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header"><h1>VIEW PRODUCT</h1></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <textarea class="form-control" id="ingredients" name="ingredients">{{ $product->ingredients }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty" value="{{ $product->qty }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{ route('products') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection