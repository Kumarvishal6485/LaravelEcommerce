<!DOCTYPE html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container-fluid mt-5">
        
        <livewire:filters cid="{{Request()->sid}}" sid="{{Request()->cid}}"/>
    </div>
    <!-- Shop End -->
    <x-footer/>
</body>
</html>