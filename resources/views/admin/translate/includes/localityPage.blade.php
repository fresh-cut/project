<div class="page-header">
    <h3 style="margin-bottom: 0; color:#0d5c6d">Cтраница города</h3>
    <hr style="margin-top: 0; ">
</div>
@foreach($localityPage as $key=>$value)
    <label>
        {{ $value[0] }}
        <textarea onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="5">{{ settings_translate($key, $value[2]) }}</textarea>
    </label>
@endforeach
<hr>
