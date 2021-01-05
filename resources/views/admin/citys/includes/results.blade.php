<table class="table">
    <thead>
    <tr style="text-align: left">
        <th>id</th>
        <th>Название города</th>
        <th>Url</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if (isset($localities) && count($localities)>0)
    @foreach($localities as $locality)
        <tr>
            <td align="left" width="5%">{{$locality->id}}</td>
            <td align="left">
                <a href="{{ route('admin.localities.edit',[$locality->region_id, $locality->id]) }}">
                    {{$locality->name}}
                </a>
            </td>
            <td align="left">{{$locality->url}}</td>
            <td align="left">
                {{--                    <a href="" class="btn btn-warning">Добавить город</a>--}}
                {{--                    <a href="" class="btn btn-danger">Удалить</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@if ($localities instanceof Illuminate\Pagination\LengthAwarePaginator)
@if($localities->total() > $localities->count() )
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $localities->links() }}
                </div>
            </div>
        </div>
    </div>
@endif
    @endif
@endif
