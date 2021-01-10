<table class="table">
    <thead>
    <tr style="text-align: left">
        <th>id</th>
        <th>Название категории</th>
        <th>Url</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if (isset($results) && count($results)>0)
        @foreach($results as $category)
            <tr>
                <td align="left" width="5%">{{$category->id}}</td>
                <td align="left">
                    <a href="{{ route('admin.categories.edit',$category->id) }}">
                        {{$category->name}}
                    </a>
                </td>
                <td align="left">
                    <a href="{{ route('category',$category->url) }}" target="_blank">
                        {{$category->url}}
                    </a>
                </td>
                <td align="left">

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($results instanceof Illuminate\Pagination\LengthAwarePaginator)
@if($results->total() > $results->count() )
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
@endif
    @endif
@endif
