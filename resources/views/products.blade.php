<!DOCTYPE html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container-fluid mt-5">
    @php use Illuminate\Support\Str; @endphp

<livewire:filters 
    :cid="request()->sid" 
    :sid="request()->cid" 
    :key="Str::slug(request()->fullUrl())"
/>

    </div>
    <!-- Shop End -->
    <x-footer/>
</body>
</html>