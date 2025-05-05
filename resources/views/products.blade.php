<!DOCTYPE html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container-fluid mt-5">
        <livewire:filters :cid="request()->sid" :sid="request()->cid" :key="Str::slug(request()->fullUrl())"/>
    </div>
    <x-footer/>
</body>
</html>