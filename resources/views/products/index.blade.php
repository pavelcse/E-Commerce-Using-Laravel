@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Products List</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($products as $product)
                    <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img width="70px" height="70px" src="{{ asset($product->image) }}" alt=""></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
