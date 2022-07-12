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
      <div class="col-sm-3">
        <a href="{{url('removeproduct/'.$item->id)}}" class="btn btn-warning">Remove product</a>
    </div>
    </div>
    </div>
</div>
<br>
@endforeach
<div class="allproducts">
    <a class="btn btn-success" href="upload">Upload new product</a>
  </div>
  
  </div>
</div>


@endsection