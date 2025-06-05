<!DOCTYPE html>
<html lang="en">
<x-header/>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<body>
  <div class="container-fluid">
    <x-admin_header />
    <div class="row">
      <x-sidebar />
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
          <livewire:chat/>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>