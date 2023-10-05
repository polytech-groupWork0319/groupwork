@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->

<a href="/profile">ホームへ</a>

<table class="table">
<tr><th>番号</th><th>ISBNコード</th><th>タイトル</th><th>作者</th></tr>
<tr>
    <td>{{ $bookInfo->id }}</td>
    <td>{{ $bookInfo->ISBN }}</td>
    <td>{{ $bookInfo->bookName }}</td>
    <td>{{ $bookInfo->author }}</td>
    <td></td>
</table>

<form method="POST" action="/reviewList">
    @csrf
    <input type="hidden" name="id" value="{{ $bookInfo->id }}">
    <button type="submit" name="show_all_reviews">全てのレビューを表示</button>
    <button type="submit" name="show_my_reviews">自分のレビューを表示</button>
</form>

<table class="table">
<tr><th>ユーザー</th><th>おすすめ度</th><th>コメント</th><th>コマンド</th></tr>
@foreach($reviews as $review)
    <tr>
        <td>{{ $review->usersId}}</td>
        <td>{{ $review->recommend }}</td>
        <td>{{ $review->comment }}</td>
        @if( $review->usersId ==  $userInfo )
        <td>
            <a href="/reviewEdit?id={{ $review->id }}" >コメントの編集</a>
            <a href="/reviewErase?id={{ $review->id }}" >コメントの削除</a>
        </td>
        @endif
    </tr>
@endforeach
</table>



@endsection