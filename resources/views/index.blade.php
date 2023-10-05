

@extends('layouts.base')
@section('title','ホーム')


@section('css')
<link rel="stylesheet" href="/css/kadai_css.css">
@endsection

@section('header')

{{-- 基本のページ 出来ることは新規登録かログインのみ--}}
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ホーム</a>
                        <form action="{{ route('user.logout') }}" method="post">
                            @csrf
                            <button>ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            
@endsection

@section('main')
<!--  -->


@endsection