@props(['name','type'=>'text','value'=>''])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <input type="{{$type}}"  name="{{$name}}" value="{{ old($name,$value) }}" class="form-control"
        id="{{$name}}">
    <x-error name="{{$name}}"></x-error>
</div>

