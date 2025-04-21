<div>
    <div class="row category-row">
      @foreach($data as $key)
      <div class="col-lg-3" id="category-col">
        @if($type == "category")
        <a href="{{url('sub_categories/'.$key->id)}}" wire:navigate>
          <div class="card category-card">
          <div class="card-body category">  
          <img src="storage/{{$key->image}}" class="category-images">
            <p>{{$key->category}}</p>
          </div>
        </div>
        @else
          <a href="{{url('products/'.$key->id.'/'.$id)}}" wire:navigate>
            <div class="card category-card">
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