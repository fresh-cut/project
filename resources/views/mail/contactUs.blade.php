<h2>Message via the contact form</h2>
<div>
    You received a message via the contact form.
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
    Message:<br>
{{ $data['message'] }}
