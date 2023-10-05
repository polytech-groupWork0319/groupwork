@extends('layouts.base')
@section('title','書籍管理')

@section('header')
<!--  -->
<h1>サンプル</h1>

@endsection

@section('main')
<!-- ログイン画面 -->
<h1>ログイン画面</h1>
    <form action="" method="post">
        @csrf
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">送信</button>
    </form>
    <p><a href="register">新規登録画面へ</a></p>
    <p><a href="/">ホームへ</a></p>
    @endsection