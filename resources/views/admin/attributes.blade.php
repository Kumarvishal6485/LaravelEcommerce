<!DOCTYPE html>
<html lang="en">
<x-header />
<meta name="csrf-token" content="{{csrf_token()}}">

<body>
  <div class="container-fluid">
    <x-admin_header />
    <div class="row">
      <x-sidebar />
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
          <div class="row mt-5 mb-3">
            <div class="col-lg-10 col-md-6"></div>
            <div class="col-lg-2 col-md-6"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#add_attribute">Add New</button></div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <table class="table table-light">
                <tr>
                  <th>S.No</th>
                  <th>Attributes</th>
                  <th>Values</th>
                </tr>
                <tr>
                  <th>1</th>
                  <th>Color</th>
                  <th>

                  </th>
                </tr>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Category modal starts -->
  <div class="modal fade" id="add_attribute" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Attribute</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="add_attribute" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="exampleFormControlInput1">Select Attribute</label><br>
              <select name="attribute" id="attribute" required>
                <option selected>Select</option>
              </select>
            </div>
            <span>
              @error('category')
              {{$message}}
              @enderror
            </span>
            <div class="form-group">
              <label for="exampleFormControlInput1">New Attribute</label><br>
              <input type="text" placeholder="Enter Attribute Title" name="attribute_new">
            </div>
            <span>
              @error('attribute_new')
              {{$message}}
              @enderror
            </span>           
            <br>
            <input class="btn btn-success" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--modal ends  -->
  <!-- Edit Sub Category modal starts -->
  <div class="modal fade" id="edit_sub_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Sub Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="edit_sub_category" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="sub_category_id" id="sub_category_id">
            <input type="hidden" name="prev_image" id="previous_image">
            <div class="form-group">
              <label for="exampleFormControlInput1">Select Category</label><br>
              <select name="category" id="prev_category">
                <option selected>Select</option>
              </select>
            </div>
            <span>
              @error('category')
              {{$message}}
              @enderror
            </span>
            <div class="form-group">
              <label for="exampleFormControlInput1">Sub Category</label>
              <input type="text" class="form-control" name="sub_category" id="previous_sub_category"
                placeholder="Sub Category">
            </div>
            <span>
              @error('sub_category')
              {{$message}}
              @enderror
            </span>
            <div class="form-group">
              <label for="exampleFormControlInput1">Sub Category Image</label>
              <img src="" id="prev_image" height="50px"><br>
              <button id="show_image_input" class="btn btn-dark mt-2">Change Image</button>
              <input type="file" class="form-control" name="image" id="new_image" placeholder="Upload Image">
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
            <input class="btn btn-success" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--modal ends  -->
  <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>