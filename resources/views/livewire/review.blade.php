<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
  data-bs-parent="#accordionExample">
  <div class="accordion-body">
    <form class="form-inline review-form" wire:submit="submit_review_data({{Request()->pid}})" >
      {{@csrf_field()}}
      <input type="hidden" wire:model="pid" value="{{Request()->pid}}">
      <div class="form-group mb-2">
        <input type="text" class="form-control" id="inputPassword2" wire:model="review_text" placeholder="Write Review here">
      </div>
      <div class="form-group mb-2">
        <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model="images" multiple>
      </div>
      <button type="submit" class="btn btn-success mb-2" >Add Review</button>
    </form>
    @if(sizeof($data) > 0)
    @foreach($data as $obj)
      <div class="product-review">
        <section class="user-details">
          <img src="{{asset('storage/site_images_icons/user_image.jpg')}}" alt="" ><span>User</span>
        </section>
        <section class="user-review">
          <span>{{$obj->review_text}}</span>
          <!-- <img src="img.jpg" alt=""> -->
        </section>
      </div>
    @endforeach
    @else
    <div class="product-review">
        <section class="user-review">
          <span>No Review Exist For this Product</span>
        </section>
      </div>
    @endif
  </div>
</div>