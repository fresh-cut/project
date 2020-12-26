@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
        @if(session('id'))
        <br>
        <a href="{{ route('blog.admin.posts.restore', session('id') )}}"> Восстановить</a>
            @endif
    </div>
@endif
