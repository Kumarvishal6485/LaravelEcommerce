<div class="accordion-body">
    @foreach($data as $attribute)
        <input type="radio" value_id = "{{$attribute->id}}"> {{$attribute->value}}
    @endforeach
</div>