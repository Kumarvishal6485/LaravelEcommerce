<span class="d-flex w-25">
    <input wire:model.live="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">    
        @if($this->get_result != NULL)
        <div class="search-items w-25">
            <section>
                @foreach($this->get_result as $key)
                <p>
                    <a href="{{url('product/'.$key->id)}}" wire:navigate>{{$key->product_name}}</a>
                </p>
                @endforeach
            </section>
        </div>
        @endif
</span>
