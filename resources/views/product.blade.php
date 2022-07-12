@extends('master')

@section('content')
    
<div class="custom-product">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

      @foreach ($products as $item)
      <div class="carousel-item active ">
        <img src="{{asset('images/slider-img/4.jpg')}}" class="d-block w-100" alt="...">
      </div>
      @endforeach

      
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
      <div class="trending-wrapper">
        <h3>Trending Products</h3><br>
        @foreach ($products as $item)
         <div class="trending-item">
            <a href="detail/{{$item['id']}}">
            <img class="trending-img" src="{{asset('images/'.$item->gallery)}}">
            <div class="trending-text">
                <h3>{{$item['name']}}</h3>
            </div>
          </a>
          </div>
         @endforeach
      </div>

  <div class="allproducts">
    <br>
    <a class="btn btn-success" href="allproducts">View All Products</a>
  </div>

</div>

@endsection