@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add a New Products</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Product Name Here" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="text" name="price" id="price" value="{{old('price')}}" placeholder="Product Price Here" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Product Name</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success float-right" type="submit">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
