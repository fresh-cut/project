<table class="table">
    <thead>
    <tr style="text-align: left">
        <th>id</th>
        <th>Дата</th>

        <th>Название компании</th>
        <th>IP автора</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($addCompany as $item)
        <tr>
            <td align="left" width="5%">{{$item->id}}</td>
            <td align="left" >{{$item->added}}</td>

            <td align="left">
                <a href="{{ route('admin.offers-companies.edit', $item->id) }}">
                    {{$item->name}}
                </a>
            </td>
            <td align="left">{{$item->ip}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
