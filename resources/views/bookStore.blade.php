@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->
<h1>以下のデータを登録しました</h1>
<table class="table">
    <tr><th>ISBNコード</th><th>タイトル</th><th>作者</th></tr>
    <tr>
        <td>{{ $ISBN }}</td>
        <td>{{ $bookname }}</td>
        <td>{{ $author }}</td>
    </tr>
</table>
<br>
<a href="/profile">ホームへ</a>
@endsection