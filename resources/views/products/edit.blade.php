@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Products</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" placeholder="Product Name Here" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="text" name="price" id="price" value="{{ $product->price }}" placeholder="Product Price Here" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Product Name</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
