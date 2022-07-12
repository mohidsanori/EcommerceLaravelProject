@extends('master')

@section('content')

<div class="container custom-login">
    <div style="justify-content: center"  class="row">
        <div class="col-sm-4">
            <form action="upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                   <br>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Price</label>
                  <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                 <br>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product category</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category">
                   <br>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
                   <br>
                  </div>
                  <div class="form-group mb-3">
                    <label for="image" class="form-label">Upload product image</label>
                    <input class="form-control" name="image" type="file" id="image">
                  </div> <br>
                  <button type="submit" class="btn btn-primary">Upload</button>
              </form>

              
              
        </div>
    </div>
</div>
@endsection