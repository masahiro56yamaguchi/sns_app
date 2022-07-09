<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SharesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // DB上の投稿データ
        $shares = Post::where('status', 1)->orderBy('updated_at', 'DESC')->get();

        return view('pages/shares/index', compact('user', 'shares'));
    }

    // 投稿ページの表示
    public function create()
    {
        return view('pages/shares/post');
    }

    // 投稿する
    public function store(Request $request)
    {
        $post = new Post;

        $img = $request->file('image');

        // 画像情報がセットされていれば、保存処理を実行
        if (isset($img)) {
            // public > storage > img配下に画像が保存される
            $path = $img->store('img','public');
        }

        $post->fill([
            'store_name' => $request->store_name,
            'dish_name' => $request->dish_name,
            'img' => $path,
            'content' => $request->body,
            'user_id' => Auth::user()->id
        ])->save();

        return redirect()->route('shares');
    }

    // 投稿編集ページを表示
    public function edit($id)
    {
        $share = Post::find($id);
        return view('pages/shares/edit', compact('share'));
    }

    // 投稿の更新
    public function update(Request $request, $id)
    {
        $share = Post::find($id);

        $img = $request->file('image');

        // 画像情報がセットされていれば、保存処理を実行
        if (isset($img)) {
            // public > storage > img配下に画像が保存される
            $path = $img->store('img','public');
        }

        if (isset($request->store_name)) {
            $share->fill(['store_name' => $request->store_name])->save();
        }

        if (isset($request->dish_name)) {
            $share->fill(['dish_name' => $request->dish_name])->save();
        }

        if (isset($img)) {
            $share->fill(['img' => $path])->save();
        }

        if (isset($request->body)) {
            $share->fill(['content' => $request->body])->save();
        }

        return redirect()->route('shares');
    }

    // 投稿の削除
    public function destroy($id)
    {
        Post::where('id', $id)->update(['status' => 2]);

        return redirect()->route('shares');
    }
}
