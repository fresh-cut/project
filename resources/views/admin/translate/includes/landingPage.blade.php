<div class="page-header">
    <h3 style="margin-bottom: 0; color:#0d5c6d">Главная страница</h3>
    <hr style="margin-top: 0; ">
</div>
@foreach($landingPage as $key=>$value)
    <label>
        {{ $value[0] }}
        <textarea onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="5">{{ settings($key, $value[2]) }}</textarea>
    </label>
@endforeach
<hr>
