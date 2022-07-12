@extends('master')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<div class="custom-product">\
   <div class="col-sm-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            
            <th scope="row">1</th>
            <td>Amount</td>
            <td>$ {{$total}}</td>
            
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Tax</td>
            <td>$ 0</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Delivery Charges</td>
            <td>$ 10</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Total Amount</td>
            <td>$ {{$total+10}}</td>
          </tr>
        </tbody>
      </table><br>
      <div>
        <form action="/orderplace" method="POST" >
            @csrf
            <div class="form-group">
              
              <textarea name="address" placeholder="Enter your address here" class="form-control" required ></textarea>
              
            </div>
            <div class="form-group">
              <label for="paymentmethod"> Payment Method</label><br><br><br>
              <input type="radio" value="Online" name="payment"><span> Paypal Payment <br><br><br></span>
              <input type="radio" value="Online" name="payment" ><span> EMI Payment <br><br><br></span>
              <input type="radio" value="cash" name="payment"><span> Payment on delivery <br> <br></span>
              
            </div>
            <button type="submit" class="btn btn-primary">Confirm Order</button>
          </form>
      </div>
        
   </div>
</div>

@endsection