<div class="form-group">
    <label for="exampleFormControlInput1">Select Product Variation</label><br>
      <select>
            <option selected disabled>Select</option>
        @foreach ($attributes as $attribute)
            <option wire:click="fetchValues({{$attribute->id}})" value="{{$attribute->id}}">{{$attribute->attribute}}</option>
        @endforeach
      </select>
      <br>
    @if ($this->value)
        <label for="exampleFormControlInput1">Select Value</label><br>
        <select>
              <option selected disabled>Select</option>
          @foreach ($values as $value)
              <option wire:click="fetchAttrVal({{$value->id}},{{$att_id}})" value="{{$value->id}}">{{$value->value}}</option>
          @endforeach
        </select>
    @endif
    <br>
    @if (count($sel_att_val) && session()->has('attributes'))
        @foreach ($sel_att_val as $key => $val)
                <?php 
                    $legend_created = true;
                ?>
            <fieldset>
                @foreach ($val as $value) 
                    <?php
                        $current_attr = $key;
                        $current_val = $value;
                    ?>
                    @foreach ($att_vals as $attr)
                        @if ($current_attr == $attr->a_id && $current_val == $attr->v_id)
                            @if ($legend_created)
                                <legend>{{ucfirst($attr->attribute)}}</legend>
                                <?php 
                                    $legend_created = false;
                                ?>
                            @endif
                            <span class="attribute_value" >{{$attr->value}}<a wire:click="removeVal({{$attr->a_id}},{{$attr->v_id}})"><i class="fa-solid fa-xmark"></i></a></span>
                        @endif
                    @endforeach
                @endforeach
            </fieldset>
        @endforeach
    @endif
</div>