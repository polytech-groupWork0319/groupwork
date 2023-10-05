@extends('layouts.base')
@section('title','書籍登録画面')

@section('header')
<!--  -->


@endsection

@section('main')
<!--  -->
<h1>書籍新規登録</h1>
<a href="/profile">ホームへ</a>

<form action="" method="post">
    @csrf
    <div>
        <label for="ISBN" class="INBN" >ISBNコード</label>
        <input type="number" name="ISBN" id="ISBN"
        value="{{ old('ISBN') }}">
    </div>

    {{--
        <div>
        <label for="bookname" class="bookname" id="bookname">タイトル</label>
        <input type="text" name="bookname" id="bookname"
        value="{{ old('bookname')}}">
    </div>
    <div>
        <label for="author" class="author" id="author">作者</label>
        <input type="text" name="author" id="author"
        value="{{ old('bookname')}}">
    </div>
        --}}

    <input type="submit" value="登録" class="btn btn-primary">

</form>


@endsection