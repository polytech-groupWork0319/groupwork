@extends('layouts.base')
@section('title','')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->

<h1>コメントの登録</h1>
<a href="/profile">ホームへ</a>

<form action="/reviewShow" method="post">
@csrf
    <input type="radio" name="recommend" id="" value="1">1
    <input type="radio" name="recommend" id="" value="2">2
    <input type="radio" name="recommend" id="" value="3">3
    <input type="radio" name="recommend" id="" value="4">4
    <input type="radio" name="recommend" id="" value="5">5


    <br>
    <label for="comment" class="comment" >コメント</label>
    <textarea name="comment" cols="30" rows="5"></textarea>
    <input type="hidden" name="id" value="{{ $record->id }}">
    <input type="submit" value="登録" class="btn btn-primary">
</form>
@endsection