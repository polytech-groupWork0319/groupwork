@extends('layouts.base')
@section('title','書籍削除')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->
<h1>以下のデータを削除しました</h1>
<table class="table">
<tr><th>投稿番号</th><th>ISBNコード</th><th>タイトル</th><th>作者</th></tr>
<tr>
    <td>{{ $id }}</td>
    <td>{{ $ISBN }}</td>
    <td>{{ $bookName }}</td>
    <td>{{ $author }}</td>
</tr>
</table>
<a href="/profile">ホームへ</a>

@endsection
