<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    //ログイン状態でなければログイン画面に戻す
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reviewInsert(Request $request)
    {
        //バリデーション()
        $input = $request->validate([
            'recommend' => 'required | string',
            'comment' => 'required | string'
        ]);
        $data = [
            'record' => book::find($request->id)
        ];
        return view('reviewInsert',$data);
    }

    //コメント登録メソッド
    public function reviewShow(Request $request)
    {

        $review = Review::query()->create([
            'bookId' => $request['id'],
            'usersId' => Auth::id(),
            'recommend' => $request['recommend'],
            'comment'=>$request['comment'],
        ]);
        return view('reviewShow',$review);
        //return redirect()->route('');
    }

    public function reviewList(Request $request)
    {
        $data = [
            'userInfo' => Auth::id(),
            'bookInfo' => book::find($request->id),
        ];
    
        if ($request->has('show_my_reviews')) {
            // 自分のレビューのみを取得
            $data['reviews'] = review::where('bookId', $request->id)->where('usersId', Auth::id())->get();
        } else {
            // 全てのレビューを取得
            $data['reviews'] = review::where('bookId', $request->id)->get();
        }
    
        return view('reviewListShow', $data);
        // $data = [
        //     'userInfo' => Auth::id(),
        //     'bookInfo' => book::find($request->id),
        //     'reviews' => review::where('bookId',$request->id)->get()
        // ];
        // return view('reviewListShow',$data);
    }


    public function reviewEdit(Request $request)
    {
        $data = [
            'userInfo' => Auth::id(),
            'reviewInfo' => review::find($request->id),
        ];
        $data['reviews'] = review::where('id', $request->id)->where('usersId', Auth::id())->get();

        return view('reviewEdit',$data);
    }

    public function reviewUpdate(Request $request)
    {
        //更新対象のレコードをフォームからのid値をもとにモデルに取り出す
        $review = review::find($request->id);
        //フォームのデータをモデルに代入
        $review -> recommend = $request->recommend;
        $review -> comment = $request->comment;
        //モデルのデータをテーブルに保存
        $review -> save();
        $data = [
            'id' => $request->id,
            'bookId' => $request->bookId,
            'usersId' => $request->userId,
            'recommend' => $request->recommend,
            'comment' => $request->comment,
        ];
        return view('reviewUpdate',$data);
    }

    public function reviewErase(Request $request)
    {
        $data = [
            'userInfo' => Auth::id(),
            'reviewInfo' => review::find($request->id),
        ];
        $data['reviews'] = review::where('id', $request->id)->where('usersId', Auth::id())->get();
        return view('reviewErase',$data);
    }

    public function reviewDelete(Request $request)
    {
        //削除対象のレコードをフォームからのid値をもとに
        //モデルに取り出す
        $review = review::find($request->id);
        //データを削除するメソッドを実行
        $review->delete();
        $data = [
            'id' => $request->id,
            'bookId' => $request->bookId,
            'usersId' => $request->usersId,
            'recommend' => $request->recommend,
            'comment' => $request->comment,
        ];
        
        return view ('reviewDelete',$data);
    }
}
