<div>
    <div class="row m-5">
      @foreach($data as $key)
      <div class="col-lg-3 mt-5">
        @if($type == "category")
        <a href="{{url('sub_categories/'.$key->id)}}">
          <div class="card" style="width: 15rem;">
          <div class="card-body category">  
          <img src="storage/{{$key->image}}" class="category-images">
            <p>{{$key->category}}</p>
          </div>
        </div>
        @else
          <a href="{{url('products/'.$key->id.'/'.$id)}}">
            <div class="card" style="width: 15rem;">
              <div class="card-body category">  
                <img src="../storage/sub_category/{{$key->image}}" class="category-images">
                <p>{{$key->sub_category}}</p>
              </div>
            </div>
        @endif
        </a>
      </div>
      @endforeach  
</div>