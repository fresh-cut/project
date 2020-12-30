<h2>Please moderate "{{ $data['company_name'] }}".</h2>
<div>
    A new comment on the post "{{ $data['company_name'] }}"
    is waiting for your approval: <a href="{{ $url }}">{{ $url }}</a>
</div>
<div>
    Autor:<br>
    {{ $data['name'] }}
</div>

<div>
    E-mail:<br>
    {{ $data['email'] }}
</div>

</div>

<div>
Comment:<br>
{{ $data['review'] }}
