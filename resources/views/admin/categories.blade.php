<!DOCTYPE html>
<html lang="en">
<x-header/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="container-fluid">
    <x-admin_header/>
    <div class="row">
      <x-sidebar/>
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
        <div class="row mt-5 mb-3">
      <div class="col-lg-10 col-md-10"></div>
      <div class="col-lg-2 col-md-2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category_modal">Add New</button></div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <table class="table table-light">
          <tr>
            <th>S.No</th>
            <th>Category</th>
            <!-- <th>Image</th> -->
            <th>Action</th>
          </tr>
          <?php 
            $i = 0;
          ?>
          @foreach($data as $key)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$key->category}}</td>
            <!-- <td><img src="{{asset('storage/'.$key->image)}}" alt=""></td> -->
            <td><a class="btn btn-primary" id="edit_category" id_val="{{$key->id}}" >Edit</a><a class="btn btn-danger" href="{{ url('admin/delete/' . $key->id) }}">Delete</a></td>
          </tr>
          @endforeach
        </table>   
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        {{$data->links()}}
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add_category" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Category</label>
                  <input type="text" class="form-control" name="category"id="exampleFormControlInput1" placeholder="Category">
                </div>
                <span>
                  @error('category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Category Image</label>
                  <input type="file" class="form-control" name="image" id="exampleFormControlInput1" placeholder="Upload Image">
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
<!-- Edit Category modal starts -->
<div class="modal fade" id="edit_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="edit_category" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" id="id_input">
                <input type="hidden" name="prev_image" id="prev_image">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Category</label>
                  <input type="text" class="form-control" name="category"id="category_input" placeholder="Category">
                </div>
                <span>
                  @error('category')
                    {{$message}}
                  @enderror
                </span>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Category Image</label><br>
                  <img src="" alt="image" id="image_input" width="150px">
                </div>
                <div class="form-group mt-2">
                  <button class="btn btn-dark" id="change_image">Change Image</button>
                  <input type="file" name="image" id="category_new_image">
                </div>
                <span>
                  @error('image')
                    {{$message}}
                  @enderror  
                </span>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="description_input" rows="3"></textarea>
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>