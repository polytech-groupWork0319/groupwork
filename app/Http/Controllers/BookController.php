<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BookController extends Controller
{
    //ログイン状態でなければログイン画面に戻す
    public function __construct()
    {
        $this->middleware('auth');
    }

    //書籍登録画面へ遷移
    public function showbookRegister()
    {
        return view('bookRegister');
    }

    //書籍新規登録メソッド
    public function bookRegister(Request $request )
    {
        //バリデーション(ISBNコードのみ)
        $input = $request->validate([
            'ISBN' => 'required | string'
        ]);

        $isbn = $request['ISBN'];
        $api_url = "https://api.openbd.jp/v1/get?isbn={$isbn}";
        $response = Http::withOptions([
            'proxy' => [
                'http' => 'http://172.16.61.1:3128', // HTTPプロキシのアドレスとポート
                'https' => 'http://172.16.61.1:3128', // HTTPSプロキシのアドレスとポート
            ]
        ])->get($api_url);
        $book_info = $response->json();

        // JSONデータからTitleTextとPersonNameを取得
        if (isset($book_info[0]['onix']['DescriptiveDetail']['TitleDetail']['TitleElement']['TitleText']['content'])) {
            $titleText = $book_info[0]['onix']['DescriptiveDetail']['TitleDetail']['TitleElement']['TitleText']['content'];
        } else {
            $titleText = 'タイトルが取得できません';
        }

        if (isset($book_info[0]['onix']['DescriptiveDetail']['Contributor']['0']['PersonName'])) {
            $personName = $book_info[0]['onix']['DescriptiveDetail']['Contributor']['0']['PersonName']['content'];
        } else {
            $personName = '著者が取得できません';
        }

        $book = Book::query()->create([
            'ISBN' => $request['ISBN'],
            'bookname'=>$titleText,
            'author' => $personName,
        ]);
        return view('bookStore',$book);

    }

    //detaに全てのデータを入れ書籍一覧表示へ遷移
    public function bookIndex()
    {
        //
        $data = [
            'records' => book::all()
        ];
        return view ('/books/index',$data);
    }

    //書籍削除画面へ遷移
    public function showbookErase(Request $request)
    {
        //get通信の場合
        if($request->isMethod('get')){
            return view ('bookErase');
        }elseif($request->isMethod('post')){
            $id=$request->id;
            $data = [
                //入力されたid値のデータを取得
                'record' => book::find($id)
            ];
            return view('bookErase',$data);
        }else{
            redirect('/');
        }
        
    }

    //削除用アクションメソッドの定義
    public function bookErase(Request $request)
    {
        return view('bookDelete');
    }


    public function bookDelete(Request $request)
    {
        //削除対象のレコードをフォームからのid値をもとにモデルに取り出す
        $book = Book::find($request->id);
        //データを削除するメソッドを実行
        $book->delete();
        $data = [
            'id' => $request->id,
            'ISBN' => $request->ISBN,
            'bookName' => $request->bookName,
            'author' => $request->author,
        ];
        return view('bookDelete',$data);
    }

}
