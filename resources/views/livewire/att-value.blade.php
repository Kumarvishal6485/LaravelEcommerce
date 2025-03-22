<div>
    @if (count($data))
        @foreach ($data as $attribute)
            <span class="attribute_value" attr_id="{{$attribute->attribute_id}}" value_id="{{$attribute->id}}">{{$attribute->value}}<a href="{{url('admin/remove_att_val/'.$attribute->id)}}"><i class="fa-solid fa-xmark"></i></a></span>
        @endforeach
    @endif
    <form wire:submit="addValue">
        <input wire:model="att_val" type="text" placeholder="+" value=" " id="livewire-att-val-{{$att_id}}" class="livewire-att-input" onLoad="showAddBtn({{$att_id}})">
    </form>
</div>