<!DOCTYPE html>
<html lang="en">
<x-header/>
<body>
  <x-navbar />
  @if(isset(Request()->pid))
    <livewire:checkout pid="{{Request()->pid}}"/>
  @else 
    <livewire:checkout/>
  @endif
  <x-footer/>
</body>
</html>