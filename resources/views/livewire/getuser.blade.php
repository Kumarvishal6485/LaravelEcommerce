<div class="accordion-body">
    <form>
    @foreach($data as $attribute)
        <input type="radio" value_id = "{{$attribute->id}}"> {{$attribute->value}} <br>
    @endforeach
    </form>
</div>