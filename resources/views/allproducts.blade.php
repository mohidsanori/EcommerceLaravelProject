@extends('master')

@section('content')


    
    <div class="container">
        <div class="row">
            @foreach ($products as $item)
            <div class="col-sm">
    <div class="card" style="width: 18rem;">
    <img src="{{asset('images/'.$item->gallery)}}" class="card-img-top" style="height: 200px, width: 200px" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$item['name']}}</h5>
      <p class="card-text">{{$item['description']}}</p>
      <p>${{$item['price']}}</p>
      <form action="/add_to_cart" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$item['id']}}">
        <button class="btn btn-primary">Add to Cart</button>
    </form>
    </div>
    </div>
</div>
<br>
@endforeach

  
  </div>
</div>


@endsection