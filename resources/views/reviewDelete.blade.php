@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->

<h1>以下のコメントを削除しました</h1>
<table></table>
<tr><th>おすすめ度</th><th>コメント</th></tr>
<tr>
    <td>{{ $recommend }}</td>
    <td>{{ $comment }}</td>
</tr>
</table>
<a href="/profile">ホームへ</a>
@endsection