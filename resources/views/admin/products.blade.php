<!DOCTYPE html>
<html lang="en">
<x-header/>
<meta name="csrf-token" content="{{csrf_token()}}">
<body>
<div class="container-fluid">
    <x-admin_header/>
    <div class="row">
      <x-sidebar/>
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
        <div class="row mt-5 mb-3">
      <div class="col-lg-8 col-md-6"></div>
      <div class="col-lg-4 col-md-6"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category_modal">Add New</button><a class="btn btn-dark m-2" href="{{url('admin/product_export')}}">Export All Products</a></div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <table class="table table-light">
          <tr>
            <th>S.No</th>
            <th>Product</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php 
            $i = 0;
          ?>
          @foreach($data as $key)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$key->product_name}}</td>
            <td>{{$key->category}}</td>
            <td>{{$key->sub_category}}</td>
            @if($key->status == 1)
                <td><a class="btn btn-success">In Stock</a></td>
            @elseif($key->status==0)
                <td><a class="btn btn-dark">Out of Stock</a></td>
            @endif
            <td><a class="btn btn-primary" id="edit_category" id_val="{{$key->id}}" >Edit</a><a class="btn btn-danger" href="{{ url('admin/delete_product/' . $key->id) }}">Delete</a></td>
          </tr>
          @endforeach
        </table>   
      </div>
    </div>
        </div>
      </div>
    </div>
</div>
<!-- Add Category modal starts -->
<div class="modal fade" id="add_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add_product" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Select Category</label><br>
                  <select name="category" id="category" required>
                    <option selected>Select</option>
                  </select>
                </div>
                <span>
                  @error('category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Select Sub Category</label><br>
                  <select name="sub_category" id="sub_category" required>
                    <option selected>Select</option>
                  </select>
                </div>
                <span>
                  @error('sub_category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Product Title</label>
                  <input type="text" class="form-control" name="product_name"id="exampleFormControlInput1" placeholder="Product Title">
                </div>
                <span>
                  @error('product')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Product Image</label>
                  <input type="file" class="form-control" name="image[]" id="exampleFormControlInput1" placeholder="Upload Image" multiple>
                </div>
                <span>
                  @error('image')
                    {{$message}}
                  @enderror  
                </span>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <span>
                  @error('description')
                    {{$message}}
                  @enderror
                </span>
                <br>
                <input class="btn btn-success" type="submit"  value="Submit">
            </form>
      </div>
    </div>
  </div>
</div>
<!--modal ends  -->
<!-- Add Category modal starts -->
<div class="modal fade" id="edit_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="edit_product_details" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                  {{csrf_field()}}
                  <input type="hidden" name="product_id" id="product_iddd">
                  <input type="hidden" name="prev_category_id" id="prev_category_id">
                  <input type="hidden" name="prev_sub_category_id" id="prev_sub_category_id">
                  <label for="exampleFormControlInput1">Select Category</label><br>
                  <select name="category" id="previous_category" required>
                    <option selected>Select</option>
                  </select>
                </div>
                <span>
                  @error('category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Select Sub Category</label><br>
                  <select name="sub_category" id="previous_sub_category" required>
                    <option selected>Select</option>
                  </select>
                </div>
                <span>
                  @error('sub_category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Product Title</label>
                  <input type="text" class="form-control" name="product_name"id="previous_product" placeholder="Product Title">
                </div>
                <span>
                  @error('product')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Product Image</label>
                  <div class="form-group" id="product_images">
                    
                  </div>
                  <button class="btn btn-dark mb-2"id="add_more_images" >Add Product Image</button>
                </div>
                <div class="form-group" id="add_new">
                  <input type="file" class="form-control" name="image[]" id="images_new_uploaded" placeholder="Upload Image" multiple>
                </div>
                <span>
                  @error('image')
                    {{$message}}
                  @enderror  
                </span>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="previous_description" rows="3"></textarea>
                </div>
                <span>
                  @error('description')
                    {{$message}}
                  @enderror
                </span>
                <br>
                <input class="btn btn-success" type="submit"  value="Submit">
            </form>
      </div>
    </div>
  </div>
</div>
<!--modal ends  -->
<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>