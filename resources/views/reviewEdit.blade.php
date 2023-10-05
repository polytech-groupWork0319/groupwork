@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->

<h1>以下のコメントの更新</h1>
<a href="/profile">ホームへ</a>


<table class="table">
<tr><th>ユーザー</th><th>おすすめ度</th><th>コメント</th></tr>
<form action="/reviewUpdate" method="post">
    @csrf
@foreach($reviews as $review)
    <tr>
        <input type="text" name="id" value="{{ $review->id}}">
        <input type="text" name="bookId" value="{{ $review->bookId}}">
        <td><input type="text" name="usersId" value="{{ $review->usersId}}" readonly></td>

        <td>{{ $review->recommend }}

            <input type="radio" name="recommend" id="" value="1">1
            <input type="radio" name="recommend" id="" value="2">2
            <input type="radio" name="recommend" id="" value="3">3
            <input type="radio" name="recommend" id="" value="4">4
            <input type="radio" name="recommend" id="" value="5">5
        </td>
        <td>
            <textarea name="comment" cols="30" rows="5">{{ $review->comment }}</textarea>
            
            <input type="submit" value="登録" class="btn btn-primary">
        </td>
    </tr>
@endforeach
</form>

@endsection