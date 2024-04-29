<!DOCTYPE html>
<html lang="en">
<x-header/>
<body>
  <x-navbar />
  <div class="container-fluid">
    <!-- category component  -->
    <!-- <x-category/> -->
    <livewire:category data_type="sub_category" id="{{Request()->id}}"/>
    <!-- category component -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-4">Products For You</h3>
      </div>
    </div>
    <livewire:products cid="{{Request()->id}}">
  </div>
  <x-footer/>
</body>
</html>