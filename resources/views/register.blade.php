@extends('layouts.base')
@section('title','新規登録画面')
@section('header')
<!--  -->

@endsection

@section('main')
<!-- 新規登録画面 -->
<h1>登録画面</h1>
<form action="" method="post">
        @csrf
        <label for="name">社員名: </label>
        <input type="text" name="name" id="name">
        <br>
        
        <label for="">社員番号: </label>
        <input type="radio" name="department_id" value="0">一般社員
        <input type="radio" name="department_id" value="1">システム部社員
        <br>
        <label for="email">メールアドレス: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">パスワード: </label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">送信</button>
    </form>
    <br>
    <a href="login">ログイン画面へ</a>
    <p><a href="/">ホームへ</a></p>

@endsection