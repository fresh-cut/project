@extends('admin.adminTemplate')
@section('title')
    Изменить отзыв на {{ $review->name }}
@endsection
@section('content')
            <h1>Редактирование отзыва</h1>
            @include('admin.includes.result_messages')
            <form action="{{ route('admin.reviews.update', $review->review_id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Имя автора</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $review->reviewer_name) }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail автора</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $review->reviewer_email) }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="ip">IP автора</label>
                        <input type="text" class="form-control" id="ip" name="ip" value="{{ $review->reviewer_ip }}" disabled>
                </div>
                <div class="form-group">
                    <label for="company_name">Название компании</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $review->name }}" autocomplete="off" disabled>
                </div>

                <div class="form-group">
                    <label for="review">Отзыв</label>
                    <textarea name="review" class="form-control" cols="30" rows="10" required> {{ old('review', $review->review_comment) }}</textarea>
                </div>
                <div class="form-check">
                    <input name="status"
                           type="hidden"
                           value="0">
                    <input type="checkbox" id="is_published" class="form-check-input" value="1" name="status" @if($review->review_status==1) checked @endif>
                    <label for="is_published" class="form-check-label">Опубликовано</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">Сохранить</button>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary ">назад</a>
                </div>
            </form>
@endsection
