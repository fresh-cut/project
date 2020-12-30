<h2>Company "{{ $data['name'] }}". Please moderate Edit Listing</h2>
<div>
    We received an application to edit company: <a href="{{$url}}">{{$url}}</a>
</div>
<div>
    User comment:<br>
        {{ $data['edit'] }}
</div>
