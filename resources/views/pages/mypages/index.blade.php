@extends('layouts.app')

@section('content')

<section id=mypages>

    @foreach ($shares as $share)
    @if ($share['user_id'] == Auth::id())
    <div class="section-title">
        <h2>マイページ</h2>
    </div>
    <div class="title-block">
        <h3> {{ $share->user->name }} </h3>
    </div>

    {{-- DB上のユーザー情報（ハードコード） --}}
    <div class="user-info">
        <h3>ユーザー情報</h3>

        <div class="user-name-block">
            <p class="info-title">ユーザー名:</p>
            <p class="user-name">{{ $share->user->name }} </p>
        </div>

        <div class="user-email-block">
            <p  class="info-title">E-mail:</p>
            <p class="user-email">{{ $share->user->email }}</p>
        </div>
      
    </div>

    <a class="edit-btn" href="">編集</a>

    <div class="title-block">
        <h3>
            <a href="" >過去の投稿を見る</a>
        </h3>
    </div>
    <div class="title-block">
        <h3>
            <a href="">コメントした投稿</a>
        </h3>
    </div>
    @endif
    @endforeach

</section>
@endsection
