<select>
    @foreach($orderStatuses as $key=>$value)
        <option wire:click="statusChanged({{$key}})" <?php if ($value == $status) echo "selected";?> >{{$value}}</option>
    @endforeach
</select>