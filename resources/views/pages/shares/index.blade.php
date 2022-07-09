@extends('layouts.app')

@section('content')
<section id="shares">
    <div class="section-title">
        <h3>投稿一覧</h3>
        <a class="share-btn" href="./post">共有する</a>
    </div>
    
    <div>
        @foreach ($shares as $share)
            <div class="post-wrapper">

                <h2>{{ $share->user->name }}</h2>
                <p class="updated_at">公開日:{{ $share['updated_at']; }} </p>

                <div class="post">

                    <img class="restaurant-img" src="{{ Storage::url($share['img']) }}">

                    <div class="post-info">
                        <p class="store-name">{{ $share['store_name']; }} </p>
                        <p class="dish-name">{{ $share['dish_name']; }} </p>
                        <p class="review">{{ $share['content']; }} </p>
                    </div>

                </div>

                <div class="btn-wrapper">

                    <button class="comment-btn" >
                        <a href="{{ route('comments', ['id' => $share->id]) }}">コメント</a>
                    </button>
                   
                     {{-- ユーザーIDと投稿IDの一致で分岐処理 --}}
                    @if ($share['user_id'] == Auth::id())
                    <button  class="edit-btn" >
                        <a href="{{ route('post.edit', ['id' => $share->id]) }}" >編集</a>
                    </button>
                   
                    <form action="{{ route('shares.destroy', ['id' => $share->id]) }}" method="POST">
                    @csrf
                    <button class="delete-btn" type="submit" >
                        <a>削除</a>
                    </button>
                    </form>
                    @endif

                </div>
            </div>

        @endforeach
        
        <div class="logout">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button  class="logout-btn" type="submit" >
                    <a>ログアウト</a>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection