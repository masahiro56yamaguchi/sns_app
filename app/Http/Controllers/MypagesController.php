<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MypagesController extends Controller
{   
    // マイページを表示
    public function index()
    {
        $user = Auth::user();

        // DB上の投稿データ
        $shares = Post::where('status', 1)->orderBy('updated_at', 'DESC')->get();

        return view('pages/mypages/index', compact('user', 'shares',));
    }

    // ユーザー情報編集ページを表示
    public function edit()
    {
        return view('pages/mypages/edit');
    }

    // ユーザー情報を更新
    public function update(Request $request)
    {   
        $user = Auth::user();

        // メールアドレスを更新
        if (isset($request->email)) {
            $user->update(['email' => $request->email]);
        }
       
       
        // パスワードを更新
        if (isset($request->oldPassword) && isset($request->newPassword) ) {
            $user->update(['password' => Hash::make($request->newPassword)]);
        }

        return redirect()->route('mypages.edit');

    }

    // 過去の投稿を表示
    public function post()
    {
        return view('pages/mypages/post');
    }

    // コメントした投稿を表示
    public function comment()
    {
        return view('pages/mypages/comment');
    }

}
