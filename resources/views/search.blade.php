@extends('master')

@section('content')
    
<div class="custom-product">
   <div class="col-sm-4">
    
   </div>
   <div class="col-sm-4">
    <div class="trending-wrapper">
        <h5>Results for Searched Products</h5>
        @foreach ($products as $item)
         <div class="searched-item">
            <a href="detail/{{$item['id']}}">
            <img class="trending-img" src="{{asset('images/'.$item->gallery)}}">
            <div class="">
                <h2>{{$item['name']}}</h2>
                <h5>{{$item['description']}}</h5>
            </div>
        </a>
          </div>
             
         @endforeach
      </div>
   </div>
</div>
@endsection