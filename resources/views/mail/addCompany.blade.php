<h2>New company "{{ $data['name'] }}". Please moderate Add Listing</h2>
<div>
    We received an application to add company to the catalog: <a href="{{ $url }}">{{ $url }}</a>
</div>
<div>
    User comment:<br>
    {{ $data['edit'] }}
</div>
