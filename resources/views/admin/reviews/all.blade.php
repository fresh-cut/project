@extends('admin.adminTemplate')
@section('title')
    Все отзывы
@endsection
@section('content')
    <h1>Все отзывы</h1>
    <br>
    @include('admin.includes.result_messages')
    <form action="{{ route('admin.reviews.destroy', 1)}}" method="post">
        @csrf
        @method('delete')
        <div class="form-group">
            <button class="btn btn-danger visually-hidden" id="delete" type="submit"></button>
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Автор</th>
            <th>E-mail автора</th>
            <th>Компания</th>
            <th>Отзыв</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr @if($review->review_status==0) style="background-color: #ccc" @endif>
                <td>{{ $review->review_id }}</td>
                <td>{{ $review->reviewer_name }} ({{ $review->reviewer_ip }})</td>
                <td>{{ $review->reviewer_email }}</td>
                <td>
                    <a href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}" target="_blank">
                        {{ $review->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review->review_id)}}">
                        @if(strlen($review->review_comment)>50)
                            {{ $comment=mb_substr($review->review_comment,0, 30).'...' }}
                         @else
                            {{ $review->review_comment }}
                        @endif
                    </a>
                </td>
                <td>{{ $review->review_data }} </td>
                <td>
                    <i class="fa fa-check" <?= ($review->review_status==0)?'style="color: red"': 'style="color: green"'?> aria-hidden="true"></i>
                </td>
                <td>
                    <input class="checkbox" onclick="getCheckedCheckBoxes()" type="checkbox" name="delete[]" value="{{$review->review_id}}">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </form>
@endsection
<style>
    .visually-hidden {
        position: absolute;
        clip: rect(0 0 0 0);
        width: 1px;
        height: 1px;
        margin: -1px;
        …
    }
</style>
    <script src="//code.jquery.com/jquery-3.5.1.min.js" ></script>
<script>
    function getCheckedCheckBoxes() {
        var a=$('input:checked'); //выбираем все отмеченные checkbox
        var count=a.length;
        var el=document.getElementById('delete');
        el.classList.remove("visually-hidden");
        el.innerText = 'Удалить('+count+')';
        if(count==0) {
            el.classList.add("visually-hidden");
        }
    }
</script>
