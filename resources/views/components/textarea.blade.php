@props(['name','value'=>''])
<div class="mb-3">
<label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
<textarea name="{{$name}}" id="$name" cols="30" rows="10" class="form-control editor">{{old($name,$value)}}</textarea>
<x-error name="{{$name}}"></x-error>
</div>
