@extends('layouts.base')
@section('title','全件表示')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->
<h1>全件表示</h1>
<a href="/profile">ホームへ</a>

<table class="table">
<tr><th>番号</th><th>ISBNコード</th><th>タイトル</th><th>作者</th><th>おすすめ</th></tr>
@foreach($records as $record)
<tr>
    <td>{{ $record->id }}</td>
    <td>{{ $record->ISBN }}</td>
    <td>{{ $record->bookName }}</td>
    <td>{{ $record->author }}</td>
    <td>
        <a href="/reviewInsert?id={{ $record->id }}">新規</a>

        <a href="/reviewList?id={{ $record->id }}">一覧</a>

        {{-- <a href="/reviewUserList?id={{ $record->id }}">自分の投稿</a> --}}
        

        
    </td>
    <td>
    
    
</tr>
@endforeach
</table>
<br>

@endsection
