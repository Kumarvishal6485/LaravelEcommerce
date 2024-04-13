<style>
    .nav-bar{
        background-color : #cecee6;
    }

    .header-text{
        color: #030a40c7;
        font-size: 27px;
        font-weight : bold;
    }

    .sidebar{
        color : white;
        background-color : #dbdada;
        height : 100vh;
    }

    li{
        list-style : none;
        padding : 15px;
        color : black;
    }
</style>
<div class="col-lg-2 col-md-2 sidebar">
    <ul class="mt-3">
        <li><a href="{{url('admin/index')}}">Dashboard</a></li>
        <li><a href="{{url('admin/categories')}}">Categories</a></li>
        <li><a href="{{url('admin/sub_categories')}}">Sub Categories</a></li>
        <li><a href="{{url('admin/products')}}">Products</a></li>
        <li><a href="{{url('admin/users')}}">Users</a></li>
    </ul>
</div>