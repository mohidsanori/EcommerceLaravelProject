@extends('master')

@section('content')

<div class="container">
<div class="row">
    <div class="col-sm-6">
        <img class="detail-img" src="{{asset('images/'.$product->gallery)}}">
    </div>

    <div class="col-sm-6 detail-page">
        <a href="/">Go Back</a> <br><br>
        <h2>{{$product['name']}}</h2>
        <h3>Price : ${{$product['price']}}</h3>
        <h4>Details : {{$product['description']}}</h4>
        <h4>Category : {{$product['category']}}</h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product['id']}}">
            <button class="btn btn-primary">Add to Cart</button>
        </form>
        <br><br>
        <form action="/buynow" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product['id']}}">
            <button class="btn btn-success">Buy Now</button>
        </form>
        <br><br><br>
    </div>
</div>
   
</div>
@endsection