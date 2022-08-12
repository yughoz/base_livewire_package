<form class="form-horizontal"  action="#" wire:submit.prevent="{{$action}}" >
    @foreach ($arr_form as $key => $value) 
        <div class="form-group">
            <label>{{$this->wording($key)}}</label>
            @if($value['type'] == "textarea")
                <textarea class="form-control classUpdate" rows="3" placeholder="Enter ..." name="{{$key}}" id="{{$key}}" wire:model="{{$key}}"></textarea>
            @else
                <input id="update_{{$key}}" type="{{$value['type']}}" name="{{$key}}" class="form-control" placeholder="{{$this->wording($key)}}" wire:model="{{$key}}" >
            @endif
            @error($key) <span class="text-danger">{{ $message }}</span> @enderror																
        </div>
    @endforeach

    
</form>